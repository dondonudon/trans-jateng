<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class c_LaporanTransaksiPerKoridor extends Controller
{
    /*
     * Dataset
     */
    public function dataset($tgl) {
        try {
            return DB::table('transaksi')
                ->select('users.name as petugas','ms_bus.nama as bus','ms_koridor.koridor',
                    DB::raw('SUM(transaksi.harga) as pendapatan')
                )
                ->leftJoin('users','transaksi.username','=','users.username')
                ->leftJoin('ms_bus','transaksi.id_bus','=','ms_bus.id')
                ->leftJoin('ms_koridor','transaksi.id_koridor','=','ms_koridor.id')
                ->where('tgl_transaksi','=',$tgl)
                ->orderBy('pendapatan','desc')
                ->groupBy('ms_koridor.koridor','transaksi.username','ms_bus.nama','users.name')
                ->get();
        } catch (\Exception $ex) {
            return response()->json([$ex]);
        }
    }

    public function index() {
        return view('dashboard.laporan.transaksi-per-koridor.index');
    }

    public function data(Request $request) {
        $tgl = $request->tgl;
        try {
            return $this->dataset($tgl);
        } catch (\Exception $ex) {
            return response()->json([$ex]);
        }
    }

    public function exportPDF($tgl) {
        try {
            $trn['data'] = $this->dataset($tgl);
            $pdf = PDF::loadView('dashboard.laporan.transaksi-per-koridor.pdf',$trn)->setPaper('a4','portrait');
            return $pdf->stream('report-bbn-per-periode.pdf');
        } catch (\Exception $ex) {
            return response()->json($ex);
        }
    }
}
