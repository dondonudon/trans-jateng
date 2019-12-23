<?php

namespace App\Http\Controllers;

use App\msDevice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class c_MasterDevice extends Controller
{
    public function index() {
        $penumpang = DB::table('ms_penumpang')->get();
        return view('dashboard.master-data.device.baru')->with('penumpang',$penumpang);
    }

    public function list() {
        return view('dashboard.master-data.device.list');
    }

    public function data(Request $request) {
        return DB::table('ms_devices')->paginate(8);
//        return msDevice::all()->paginate(10)->toJson();
    }

    public function edit($id) {
        if (DB::table('ms_devices')->where('id','=',$id)->exists()) {
            $data = DB::table('ms_devices')
                ->where('id','=',$id)
                ->first();
            return view('dashboard.master-data.device.edit')->with('data',$data);
        } else {
            return abort(404);
        }
    }

    public function submit(Request $request) {
        $type = $request->type;
        $nama = $request->nama;
        $imei = $request->imei;

        try {
            $result = '';
            DB::beginTransaction();
            if ($type == 'baru') {
                $dtNama = DB::table('ms_devices')->where('nama','=',$nama);
                $dtImei = DB::table('ms_devices')->where('imei','=',$imei);
                if ($dtNama->doesntExist() && $dtImei->doesntExist()) {
                    $device = new msDevice();
                    $device->nama = $nama;
                    $device->imei = $imei;
                    $device->save();
                    $kode = 'D'.str_pad($device->id,4,'0',STR_PAD_LEFT);
                    DB::table('ms_devices')->where('id','=',$device->id)
                        ->update([
                            'kode' => $kode
                        ]);
                    $result = 'success';
                } else {
                    $result = 'Nama atau Imei sudah terdaftar.';
                }
            } elseif ($type == 'edit') {
                DB::table('ms_devices')
                    ->where('id','=',$request->id)
                    ->update([
                        'nama' => $nama,
                        'imei' => $imei
                    ]);
                $result = 'success';
            }
            DB::commit();
            return $result;
        } catch (\Exception $ex) {
            DB::rollBack();
            $err = [$ex];
            return response()->json($err);
        }
    }

    public function disable(Request $request) {
        $id = $request->id;
        try {
            DB::beginTransaction();
            DB::table('ms_devices')->where('id','=',$id)
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
            DB::table('ms_devices')->where('id','=',$id)
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
