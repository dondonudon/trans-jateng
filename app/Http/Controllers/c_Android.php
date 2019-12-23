<?php

namespace App\Http\Controllers;

use App\problem;
use App\transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class c_Android extends Controller
{
    /*
     * Login User
     */
    public function login(Request $request) {
        $username = $request->username;
        $password = $request->password;
        try {
            $result = [];
            $dbUser = DB::table('users')
                ->where([
                    ['username','=',$username]
                ])
                ->whereIn('system',['0','1']);
            if ($dbUser->exists()) {
                $dtUser = $dbUser->first();
                if (Crypt::decryptString($dtUser->password) == $password) {
                    $result = [
                        'status' => 'success',
                        'data' => DB::table('users')
                            ->select('username','name','email','no_hp','created_at')
                            ->where('username','=',$username)->first()
                    ];
                } else {
                    $result = [
                        'status' => 'failed',
                        'message' => 'password salah'
                    ];
                }
            } else {
                $result = [
                    'status' => 'failed',
                    'message' => 'user tidak terdaftar'
                ];
            }
            return response()->json($result);
        } catch (\Exception $ex) {
            return response()->json($ex);
        }
    }

    public function sync(Request $request) {
        $data = json_decode($request->data);
        try {
            DB::beginTransaction();
            foreach ($data as $d) {
                $trn = new transaksi();
                $trn->no_transaksi = $d->no_trn;
                $trn->tgl_transaksi = $d->tgl;
                $trn->jam_transaksi = $d->jam;
                $trn->id_penumpang = $d->penumpang;
                $trn->id_bus = $d->bus;
                $trn->opsi_bayar = $d->opsi_bayar;
                $trn->harga = $d->harga;
                $trn->username = $d->username;
                $trn->shift = $d->shift;
                $trn->id_koridor = $d->koridor;
                $trn->trip = $d->trip;
                $trn->save();
            }
            DB::commit();
            $result = [
                'status' => 'success'
            ];
            return response()->json($result);
        } catch (\Exception $ex) {
//            return response()->json($ex);
            dd('Exception Block',$ex);
        }
    }

    /*
     * Problem Report
     */
    public function problemReport(Request $request) {
        $koridor = $request->koridor;
        $bus = $request->bus;
        $ket = $request->keterangan;
        $user = $request->username;
        $lng = $request->longitude ?? '';
        $lat = $request->latitude ?? '';
        $trip = $request->trip;
        $shift = $request->shift;
        try {
            DB::beginTransaction();
            $report = new problem();
            $report->id_koridor = $koridor;
            $report->id_bus = $bus;
            $report->keterangan = $ket;
            $report->username = $user;
            $report->longitude = $lng;
            $report->latitude = $lat;
            $report->trip = $trip;
            $report->shift = $shift;
            $report->save();
            DB::commit();
            return response()->json(['status'=>'success']);
        } catch (\Exception $ex) {
            DB::rollBack();
            return response()->json(['status'=>'failed','error'=>$ex]);
        }
    }
}
