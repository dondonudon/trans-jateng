<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class c_LaporanTransaksiPerJenis extends Controller
{
    /*
    * Dataset
    */
    public function dataset($tgl) {
        try {
            return DB::table('transaksi')
                ->select('ms_penumpang.jenis',
                    DB::raw("SUM(IF(HOUR(transaksi.jam_transaksi)=00,1,0)) AS 'j_00'"),
                    DB::raw("SUM(IF(HOUR(transaksi.jam_transaksi)=1,1,0)) AS 'j_01'"),
                    DB::raw("SUM(IF(HOUR(transaksi.jam_transaksi)=2,1,0)) AS 'j_02'"),
                    DB::raw("SUM(IF(HOUR(transaksi.jam_transaksi)=3,1,0)) AS 'j_03'"),
                    DB::raw("SUM(IF(HOUR(transaksi.jam_transaksi)=4,1,0)) AS 'j_04'"),
                    DB::raw("SUM(IF(HOUR(transaksi.jam_transaksi)=5,1,0)) AS 'j_05'"),
                    DB::raw("SUM(IF(HOUR(transaksi.jam_transaksi)=6,1,0)) AS 'j_06'"),
                    DB::raw("SUM(IF(HOUR(transaksi.jam_transaksi)=7,1,0)) AS 'j_07'"),
                    DB::raw("SUM(IF(HOUR(transaksi.jam_transaksi)=8,1,0)) AS 'j_08'"),
                    DB::raw("SUM(IF(HOUR(transaksi.jam_transaksi)=9,1,0)) AS 'j_09'"),
                    DB::raw("SUM(IF(HOUR(transaksi.jam_transaksi)=10,1,0)) AS 'j_10'"),
                    DB::raw("SUM(IF(HOUR(transaksi.jam_transaksi)=11,1,0)) AS 'j_11'"),
                    DB::raw("SUM(IF(HOUR(transaksi.jam_transaksi)=12,1,0)) AS 'j_12'"),
                    DB::raw("SUM(IF(HOUR(transaksi.jam_transaksi)=13,1,0)) AS 'j_13'"),
                    DB::raw("SUM(IF(HOUR(transaksi.jam_transaksi)=14,1,0)) AS 'j_14'"),
                    DB::raw("SUM(IF(HOUR(transaksi.jam_transaksi)=15,1,0)) AS 'j_15'"),
                    DB::raw("SUM(IF(HOUR(transaksi.jam_transaksi)=16,1,0)) AS 'j_16'"),
                    DB::raw("SUM(IF(HOUR(transaksi.jam_transaksi)=17,1,0)) AS 'j_17'"),
                    DB::raw("SUM(IF(HOUR(transaksi.jam_transaksi)=18,1,0)) AS 'j_18'"),
                    DB::raw("SUM(IF(HOUR(transaksi.jam_transaksi)=19,1,0)) AS 'j_19'"),
                    DB::raw("SUM(IF(HOUR(transaksi.jam_transaksi)=20,1,0)) AS 'j_20'"),
                    DB::raw("SUM(IF(HOUR(transaksi.jam_transaksi)=21,1,0)) AS 'j_21'"),
                    DB::raw("SUM(IF(HOUR(transaksi.jam_transaksi)=22,1,0)) AS 'j_22'"),
                    DB::raw("SUM(IF(HOUR(transaksi.jam_transaksi)=23,1,0)) AS 'j_23'"),
                    DB::raw("COUNT(transaksi.no_transaksi) AS 'total_transaksi'"),
                    DB::raw("SUM(transaksi.harga) AS 'total_rupiah'")
                )
                ->leftJoin('ms_penumpang','transaksi.id_penumpang','=','ms_penumpang.id')
                ->where([
                    ['transaksi.tgl_transaksi','=',$tgl],
//                    ['opsi_bayar','=','tiket manual']
                ])
                ->groupBy('ms_penumpang.jenis')
                ->get();
        } catch (\Exception $ex) {
            return response()->json([$ex]);
        }
    }

    /*
    * Dataset Offline Transaction
    */
    public function datasetOffline($tgl) {
        try {
            return DB::table('transaksi')
                ->select('transaksi.username',
                    DB::raw("COUNT(transaksi.no_transaksi) AS 'total_transaksi'"),
                    DB::raw("SUM(transaksi.harga) AS 'total_rupiah'")
                )
                ->leftJoin('ms_penumpang','transaksi.id_penumpang','=','ms_penumpang.id')
                ->where([
                    ['transaksi.tgl_transaksi','=',$tgl],
                    ['opsi_bayar','=',0]
                ])
                ->groupBy('transaksi.username')
                ->get();
        } catch (\Exception $ex) {
            return response()->json([$ex]);
        }
    }

    public function index() {
        return view('dashboard.laporan.transaksi-per-jenis.index');
    }

    public function data(Request $request) {
        $tgl = $request->tanggal;
        try {
            return $this->dataset($tgl);
        } catch (\Exception $ex) {
            return response()->json([$ex]);
        }
    }

    public function dataOffline(Request $request) {
        $tgl = $request->tanggal;
        try {
            return $this->datasetOffline($tgl);
        } catch (\Exception $ex) {
            return response()->json([$ex]);
        }
    }

    public function exportPDF($tgl) {
        $trn['data'] = $this->dataset($tgl);
        $trn['dataoffline'] = $this->datasetOffline($tgl);
        try {
            $pdf = PDF::loadView('dashboard.laporan.transaksi-per-jenis.pdf',$trn)->setPaper('a4','landscape');
            return $pdf->stream('report-bbn-per-periode.pdf');
        } catch (\Exception $ex) {
            return response()->json([$ex,$trn]);
        }
    }
}
