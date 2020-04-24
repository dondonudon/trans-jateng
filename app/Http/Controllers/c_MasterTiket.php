<?php

namespace App\Http\Controllers;

use App\msTiket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class c_MasterTiket extends Controller
{
    public function index()
    {
        $penumpang = DB::table('ms_penumpang')->get();
        return view('dashboard.master-data.tiket.baru')->with('penumpang', $penumpang);
    }

    public function list()
    {
        return view('dashboard.master-data.tiket.list');
    }

    public function data(Request $request)
    {
        $filters = $request->filters;
        $data = [
            'where' => []
        ];
        if ($filters !== null) {
            foreach ($filters as $f) {
                $data['where'][] = [
                    $f['field'], $f['type'], '%' . $f['value'] . '%'
                ];
            }
        }
        return DB::table('ms_tiket')
            ->select('ms_tiket.id', 'ms_tiket.kode', 'ms_tiket.tipe', 'ms_tiket.awal', 'ms_tiket.akhir', 'ms_tiket.qty', 'ms_tiket.sisa', 'ms_tiket.status', 'ms_penumpang.jenis')
            ->join('ms_penumpang', 'ms_penumpang.id', '=', 'ms_tiket.tipe')
            //->where('ms_tiket.id', '=', $id)

            ->where($data['where'])
            ->paginate(8);
    }

    public function edit($id)
    {
        if (DB::table('ms_tiket')->where('ms_tiket.id', '=', $id)->exists()) {
            $data = DB::table('ms_tiket')
                ->select('ms_tiket.id', 'ms_tiket.kode', 'ms_tiket.tipe', 'ms_tiket.awal', 'ms_tiket.akhir', 'ms_tiket.qty', 'ms_tiket.sisa', 'ms_penumpang.jenis')
                ->join('ms_penumpang', 'ms_penumpang.id', '=', 'ms_tiket.tipe')
                ->where('ms_tiket.id', '=', $id)
                ->first();
            return view('dashboard.master-data.tiket.edit')->with('data', $data);
        } else {
            return abort(404);
        }
    }

    public function submit(Request $request)
    {
        $type = $request->type;
        $penumpang = $request->penumpang;
        $awal = $request->awal;
        $akhir = $request->akhir;
        $qty = $request->qty;

        try {
            DB::beginTransaction();
            if ($type == 'baru') {
                $msTiket = new msTiket();
                $msTiket->tipe = $penumpang;
                $msTiket->awal = $awal;
                $msTiket->akhir = $akhir;
                $msTiket->qty = $qty;
                $msTiket->sisa = $qty;
                $msTiket->save();
                $kode = 'T' . str_pad($msTiket->id, 4, '0', STR_PAD_LEFT);
                DB::table('ms_tiket')->where('id', '=', $msTiket->id)
                    ->update([
                        'kode' => $kode
                    ]);
                $result = 'success';
            } elseif ($type == 'edit') {
                DB::table('ms_tiket')
                    ->where('id', '=', $request->id)
                    ->update([
                        'tipe' => $penumpang,
                        'awal' => $awal,
                        'akhir' => $akhir,
                        'qty' => $qty,
                        'sisa' => $qty,
                    ]);
            }
            DB::commit();
            return 'success';
        } catch (\Exception $ex) {
            DB::rollBack();
            return response()->json($ex);
        }
    }

    public function disable(Request $request)
    {
        $id = $request->id;
        try {
            DB::beginTransaction();
            DB::table('ms_tiket')->where('id', '=', $id)
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

    public function activate(Request $request)
    {
        $id = $request->id;
        try {
            DB::beginTransaction();
            DB::table('ms_tiket')->where('id', '=', $id)
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
