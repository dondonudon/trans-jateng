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
                ->select('transaksi.username','users.name as petugas','ms_bus.nama as bus',DB::raw('SUM(transaksi.harga) as pendapatan'))
                ->join('users','transaksi.username','=','users.username')
                ->leftJoin('ms_bus','transaksi.id_bus','=','ms_bus.id')
                ->where('tgl_transaksi','=',$tgl)
                ->orderBy('pendapatan','desc')
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

    public function exportDetailPetugasPDF($tgl,$username) {
        try {
            $trn['data'] = DB::table('transaksi')
                ->select('transaksi.no_transaksi','transaksi.jam_transaksi','ms_penumpang.jenis as penumpang','ms_pembayaran.nama as pembayaran',
                    DB::raw('CONCAT(ms_bus.nama," - ",ms_koridor.koridor) AS bus'),
                    'transaksi.harga'
                )
                ->leftJoin('ms_penumpang','transaksi.id_penumpang','=','ms_penumpang.id')
                ->leftJoin('ms_bus','transaksi.id_bus','=','ms_bus.id')
                ->leftJoin('ms_koridor','ms_bus.id_koridor','=','ms_koridor.id')
                ->leftJoin('ms_pembayaran','transaksi.opsi_bayar','=','ms_pembayaran.id')
                ->where([
                    ['username','=',$username],
                    ['tgl_transaksi','=',$tgl],
                ])->get();
            $trn['user'] = DB::table('users')
                ->where('username','=',$username)
                ->first();
            $pdf = PDF::loadView('dashboard.laporan.transaksi-petugas.pdf-detail',$trn)
                ->setPaper('a4','portrait');
            return $pdf->stream('laporan-transaksi-petugas.pdf');
        } catch (\Exception $ex) {
            dd('Exception Block',$ex);
        }
    }
}
