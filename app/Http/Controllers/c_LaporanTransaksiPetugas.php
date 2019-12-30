<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class c_LaporanTransaksiPetugas extends Controller
{
    /*
     * Dataset
     */
    public function dataset($tgl) {
        try {
            return DB::table('transaksi')
                ->select('users.name as petugas','ms_bus.nama as bus',DB::raw('SUM(transaksi.harga) as pendapatan'))
                ->join('users','transaksi.username','=','users.username')
                ->leftJoin('ms_bus','transaksi.id_bus','=','ms_bus.id')
                ->where('tgl_transaksi','=',$tgl)
                ->orderBy('pendapatan')
                ->groupBy('transaksi.username','ms_bus.nama','users.name')
                ->get();
        } catch (\Exception $ex) {
            return response()->json([$ex]);
        }
    }

    public function index() {
        return view('dashboard.laporan.transaksi-petugas.index');
    }

    public function data(Request $request) {
        $tgl = $request->tanggal;
        try {
            return $this->dataset($tgl);
        } catch (\Exception $ex) {
            return response()->json([$ex]);
        }
    }

    public function exportPDF($tgl) {
        try {
            $trn['data'] = $this->dataset($tgl);
            $pdf = PDF::loadView('dashboard.laporan.transaksi-petugas.pdf',$trn)->setPaper('a4','portrait');
            return $pdf->stream('report-bbn-per-periode.pdf');
        } catch (\Exception $ex) {
            return response()->json($ex);
        }
    }
}
