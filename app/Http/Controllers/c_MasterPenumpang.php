<?php

namespace App\Http\Controllers;

use App\msPenumpang;
use App\msPenumpangBayar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class c_MasterPenumpang extends Controller
{
    public function index()
    {
        $data['pembayaran'] = DB::table('ms_pembayaran')->where('status', '=', 1)->get();
        return view('dashboard.master-data.penumpang.baru')->with('data', $data);
    }

    public function list()
    {
        return view('dashboard.master-data.penumpang.list');
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
        return DB::table('ms_penumpang')
            ->select(
                'ms_penumpang.id',
                'jenis',
                'harga',
                'ms_penumpang.status',
                DB::raw('GROUP_CONCAT(ms_pembayaran.nama) as pembayaran')
            )
            ->leftJoin('ms_penumpang_bayar', 'ms_penumpang.id', '=', 'ms_penumpang_bayar.id_penumpang')
            ->leftJoin('ms_pembayaran', 'ms_penumpang_bayar.id_pembayaran', '=', 'ms_pembayaran.id')
            ->groupBy('ms_penumpang.id', 'ms_penumpang.jenis', 'ms_penumpang.harga', 'ms_penumpang.status')
            ->orderBy('ms_penumpang.id', 'asc')
            // ->orderBy('ms_pembayaran.nama','asc')
            ->where($data['where'])
            ->paginate(8);
    }

    public function edit($id)
    {
        $data = [
            'penumpang' => msPenumpang::find($id),
            'pembayaran' => DB::table('ms_pembayaran')->where('status', '=', 1)->get(),
            'bayar' => DB::table('ms_penumpang_bayar')
                ->where('id_penumpang', '=', $id)
                ->pluck('id_pembayaran')->toArray()
        ];
        return view('dashboard.master-data.penumpang.edit')->with('data', $data);
    }

    public function submit(Request $request)
    {
        $type = $request->type;
        $jenis = $request->jenis;
        $harga = str_replace(',', '', $request->harga);
        $pembayaran = $request->pembayaran;

        try {
            $result = '';
            DB::beginTransaction();
            if ($type == 'baru') {
                if (DB::table('ms_penumpang')->where('jenis', '=', $jenis)->doesntExist()) {
                    $msPenumpang = new msPenumpang();
                    $msPenumpang->jenis = $jenis;
                    $msPenumpang->harga = $harga;
                    $msPenumpang->save();
                    $result = 'success';

                    foreach ($pembayaran as $p) {
                        $Bayar = new msPenumpangBayar();
                        $Bayar->id_penumpang = $msPenumpang->id;
                        $Bayar->id_pembayaran = $p;
                        $Bayar->save();
                    }
                } else {
                    $result = 'Nama Jenis sudah ada';
                }
            } elseif ($type == 'edit') {
                $id = $request->id;
                DB::table('ms_penumpang')
                    ->where('id', '=', $id)
                    ->update([
                        'jenis' => $jenis,
                        'harga' => $harga,
                    ]);
                DB::table('ms_penumpang_bayar')->where('id_penumpang', '=', $id)->delete();
                foreach ($pembayaran as $p) {
                    $Bayar = new msPenumpangBayar();
                    $Bayar->id_penumpang = $id;
                    $Bayar->id_pembayaran = $p;
                    $Bayar->save();
                }
                $result = 'success';
            }
            DB::commit();
            return $result;
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
            DB::table('ms_penumpang')->where('id', '=', $id)
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
            DB::table('ms_penumpang')->where('id', '=', $id)
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
