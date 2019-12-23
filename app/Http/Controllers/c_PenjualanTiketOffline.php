<?php

namespace App\Http\Controllers;

use App\msPenumpang;
use App\transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class c_PenjualanTiketOffline extends Controller
{
    public function index() {
        return view('dashboard.penjualan.tiket-offline.baru');
    }

    public function submit(Request $request) {
        $user = Session::get('username');
        $koridor = $request->koridor;
        $penumpang = $request->penumpang;
        $start = $request->start_tiket;
        $end = $request->end_tiket;
        $dtPenumpang = msPenumpang::find($penumpang);
        try {
            DB::beginTransaction();
            for ($x=$start; $x<=$end; $x++) {
                $trn = new transaksi();
                $trn->no_transaksi = $x;
                $trn->tgl_transaksi = date('Y-m-d');
                $trn->jam_transaksi = date('H:i:s');
                $trn->id_penumpang = $penumpang;
                $trn->id_bus = 0;
                $trn->opsi_bayar = 'tiket offline';
                $trn->harga = $dtPenumpang->harga;
                $trn->username = $user;
                $trn->shift = 0;
                $trn->id_koridor = $koridor;
                $trn->trip = '-';
                $trn->save();
            }
            DB::commit();
            return 'success';
        } catch (\Exception $ex) {
            DB::rollBack();
            return response()->json($ex);
        }
    }
}
