<?php

namespace App\Http\Controllers;

use App\msPenumpang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class c_MasterPenumpang extends Controller
{
    public function index() {
        return view('dashboard.master-data.penumpang.baru');
    }

    public function list() {
        return view('dashboard.master-data.penumpang.list');
    }

    public function data() {
        return DB::table('ms_penumpang')->paginate(8);
    }

    public function edit($id) {
        $data = msPenumpang::find($id);
        return view('dashboard.master-data.penumpang.edit')->with('data',$data);
    }

    public function submit(Request $request) {
        $type = $request->type;
        $jenis = $request->jenis;
        $harga = $request->harga;

        try {
            $result = '';
            DB::beginTransaction();
            if ($type == 'baru') {
                if (DB::table('ms_penumpang')->where('jenis','=',$jenis)->doesntExist()) {
                    $msBus = new msPenumpang();
                    $msBus->jenis = $jenis;
                    $msBus->harga = $harga;
                    $msBus->save();
                    $result = 'success';
                } else {
                    $result = 'Nama Jenis sudah ada';
                }
            } elseif ($type == 'edit') {
                DB::table('ms_penumpang')
                    ->where('id','=',$request->id)
                    ->update([
                        'jenis' => $jenis,
                        'harga' => $harga,
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
            DB::table('ms_penumpang')->where('id','=',$id)
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
            DB::table('ms_penumpang')->where('id','=',$id)
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
