<?php

namespace App\Http\Controllers;

use App\msPembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class c_MasterPembayaran extends Controller
{
    public function index() {
        return view('dashboard.master-data.pembayaran.baru');
    }

    public function list() {
        return view('dashboard.master-data.pembayaran.list');
    }

    public function data(Request $request) {
        $filters = $request->filters;
        $data = [
            'where' => []
        ];
        if ($filters !== null) {
            foreach ($filters as $f) {
                $data['where'][] = [
                    $f['field'],$f['type'],'%'.$f['value'].'%'
                ];
            }
        }
        return DB::table('ms_pembayaran')
            ->where($data['where'])
            ->paginate(8);
    }

    public function edit($id) {
        $data = msPembayaran::find($id);
        return view('dashboard.master-data.pembayaran.edit')->with('data',$data);
    }

    public function submit(Request $request) {
        $type = $request->type;
        $nama = $request->nama;
        $keterangan = $request->keterangan;

        try {
            $result = '';
            DB::beginTransaction();
            if ($type == 'baru') {
                if (DB::table('ms_pembayaran')->where('nama','=',$nama)->doesntExist()) {
                    $Pembayaran = new msPembayaran();
                    $Pembayaran->nama = $nama;
                    $Pembayaran->keterangan = $keterangan;
                    $Pembayaran->save();
                    $result = 'success';
                } else {
                    $result = 'Nama Pembayaran sudah ada';
                }
            } elseif ($type == 'edit') {
                DB::table('ms_pembayaran')
                    ->where('id','=',$request->id)
                    ->update([
                        'nama' => $nama,
                        'keterangan' => $keterangan,
                    ]);
                $result = 'success';
            }
            DB::commit();
            return $result;
        } catch (\Exception $ex) {
            DB::rollBack();
            return response()->json($ex);
        }
    }

    public function disable(Request $request) {
        $id = $request->id;
        try {
            DB::beginTransaction();
            DB::table('ms_pembayaran')->where('id','=',$id)
                ->update([
                    'status' => 0
                ]);
            DB::commit();
            return 'success';
        } catch (\Exception $ex) {
            DB::rollBack();
            return json_encode([$ex]);
        }
    }

    public function activate(Request $request) {
        $id = $request->id;
        try {
            DB::beginTransaction();
            DB::table('ms_pembayaran')->where('id','=',$id)
                ->update([
                    'status' => 1
                ]);
            DB::commit();
            return 'success';
        } catch (\Exception $ex) {
            DB::rollBack();
            return json_encode([$ex]);
        }
    }
}
