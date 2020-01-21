<?php

namespace App\Http\Controllers;

use App\msLibur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class c_MasterHariLibur extends Controller
{
    public function index() {
        $penumpang = DB::table('ms_penumpang')->get();
        return view('dashboard.master-data.hari-libur.baru')->with('penumpang',$penumpang);
    }

    public function list() {
        return view('dashboard.master-data.hari-libur.list');
    }

    public function data(Request $request) {
        $start = $request->start;
        $end = $request->end;
        $data = DB::table('ms_libur')
            ->select('ms_libur.tanggal','ms_libur.keterangan',
                DB::raw('GROUP_CONCAT(ms_penumpang.jenis) as penumpang')
            )
            ->leftJoin('ms_penumpang','ms_libur.id_penumpang','=','ms_penumpang.id')
            ->whereBetween('ms_libur.tanggal',[$start,$end])
            ->groupBy('ms_libur.tanggal','ms_libur.keterangan')
            ->orderBy('ms_libur.tanggal','asc')
            ->paginate(8);
        return json_encode($data);
    }

    public function edit($tgl) {
        if (strtotime($tgl) !== false && DB::table('ms_libur')->where('tanggal','=',$tgl)->exists()) {
            $penumpang = DB::table('ms_penumpang')->get();
            $data = DB::table('ms_libur')
                ->where('tanggal','=',$tgl)
                ->get();
            return view('dashboard.master-data.hari-libur.edit')->with('data',$data)->with('penumpang',$penumpang);
        } else {
            return abort(404);
        }
    }

    public function submit(Request $request) {
        $type = $request->type;
        $tgl = date('Y-m-d',strtotime($request->tanggal));
        $penumpang = $request->penumpang;
        $keterangan = $request->keterangan;

        try {
            DB::beginTransaction();
            if ($type == 'baru') {
                foreach ($penumpang as $p) {
                    $msLibur = new msLibur();
                    $msLibur->tanggal = $tgl;
                    $msLibur->id_penumpang = $p;
                    $msLibur->keterangan = $keterangan;
                    $msLibur->save();
                }
            } elseif ($type == 'edit') {
                DB::table('ms_libur')->where('tanggal','=',$tgl)->delete();
                foreach ($penumpang as $p) {
                    $msLibur = new msLibur();
                    $msLibur->tanggal = $tgl;
                    $msLibur->id_penumpang = $p;
                    $msLibur->keterangan = $keterangan;
                    $msLibur->save();
                }
            }
            DB::commit();
            return 'success';
        } catch (\Exception $ex) {
            DB::rollBack();
            return response()->json($ex);
        }
    }

    public function delete(Request $request) {
        $id = $request->id;
        try {
            DB::beginTransaction();
            DB::table('ms_libur')->where('id','=',$id)->delete();
            DB::commit();
            return 'success';
        } catch (\Exception $ex) {
            return response()->json([$ex]);
        }
    }
}
