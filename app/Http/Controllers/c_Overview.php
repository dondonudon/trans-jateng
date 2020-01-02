<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class c_Overview extends Controller
{
    public function dataset() {
        try {
            $tgl = date('Y-m-d');
//            $tgl = '2019-12-27';
            return DB::table('transaksi')
                ->select(
                    'ms_penumpang.jenis',
                    DB::raw('COUNT(transaksi.id) as total')
                )
                ->leftJoin('ms_penumpang','transaksi.id_penumpang','=','ms_penumpang.id')
                ->where('tgl_transaksi','=',$tgl)
                ->groupBy('ms_penumpang.jenis')
                ->get();
        } catch (\Exception $ex) {
            return response()->json([$ex]);
        }
    }

    public function index() {
        $data = $this->dataset();
        return view('dashboard.overview.index')->with('transaksi',$data);
    }
}
