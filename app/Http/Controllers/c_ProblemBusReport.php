<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class c_ProblemBusReport extends Controller
{
    /*
     * Dataset
     */
    public function dataset($start,$end) {
        try {
            return DB::table('problems')
                ->select('problems.keterangan','ms_bus.nama as bus','ms_koridor.koridor','users.name','longitude','latitude','trip','shift'
                )
                ->leftJoin('users','transaksi.username','=','users.username')
                ->leftJoin('ms_bus','transaksi.id_bus','=','ms_bus.id')
                ->leftJoin('ms_koridor','transaksi.id_koridor','=','ms_koridor.id')
                ->whereBetween('tgl_transaksi',[$start, $end.' 23:59:59'])
                ->orderBy('problems.created-at','desc')
                ->paginate(8);
        } catch (\Exception $ex) {
            return response()->json([$ex]);
        }
    }

    public function index() {
        return view('dashboard.laporan.transaksi-per-koridor.index');
    }

    public function data(Request $request) {
        $start = $request->start;
        $end = $request->end;
        try {
            return $this->dataset($start,$end);
        } catch (\Exception $ex) {
            return response()->json([$ex]);
        }
    }

    public function exportPDF($start,$end) {
        try {
            $trn['data'] = $this->dataset($start,$end);
            $pdf = PDF::loadView('dashboard.laporan.transaksi-per-koridor.pdf',$trn)->setPaper('a4','portrait');
            return $pdf->stream('report-bbn-per-periode.pdf');
        } catch (\Exception $ex) {
            return response()->json($ex);
        }
    }
}
