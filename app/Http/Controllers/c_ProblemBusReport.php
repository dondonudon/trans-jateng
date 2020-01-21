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
                ->select( 'problems.id','problems.keterangan','ms_bus.nama as bus','ms_koridor.koridor','users.name','problems.longitude','problems.latitude','trip','shift','problems.status','problems.created_at'
                )
                ->leftJoin('users','problems.username','=','users.username')
                ->leftJoin('ms_bus','problems.id_bus','=','ms_bus.id')
                ->leftJoin('ms_koridor','problems.id_koridor','=','ms_koridor.id')
                ->whereBetween('problems.created_at',[$start, $end.' 23:59:59'])
                ->orderBy('problems.created_at','desc')
                ->paginate(8);
        } catch (\Exception $ex) {
            return response()->json([$ex]);
        }
    }

    public function index() {
        return view('dashboard.problem.bus-report.index');
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

    public function detail($id) {
        try {
            DB::beginTransaction();
            $dataset = DB::table('problems')
                ->select( 'problems.id','problems.keterangan','ms_bus.nama as bus','ms_koridor.koridor','users.name','problems.longitude','problems.latitude','trip','shift','problems.created_at'
                )
                ->leftJoin('users','problems.username','=','users.username')
                ->leftJoin('ms_bus','problems.id_bus','=','ms_bus.id')
                ->leftJoin('ms_koridor','problems.id_koridor','=','ms_koridor.id')
                ->where('problems.id','=',$id);
            $dataset->update([
                'problems.status' => 1
            ]);
            DB::commit();
            return view('dashboard.problem.bus-report.detail')->with('data',$dataset->first());
        } catch (\Exception $ex) {
            DB::rollBack();
            return response()->json($ex);
        }
    }
}
