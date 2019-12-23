<?php

namespace App\Http\Controllers;

use App\msKoridor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class c_MasterKoridor extends Controller
{
    public function index() {
        return view('dashboard.master-data.koridor.baru');
    }

    public function list() {
        return view('dashboard.master-data.koridor.list');
    }

    public function data() {
//        $data['data'] = msKoridor::all();
        return DB::table('ms_koridor')->paginate(8);
    }

    public function edit($id) {
        $data = DB::table('ms_koridor')->where('id','=',$id)->first();
        return view('dashboard.master-data.koridor.edit')->with('data',$data);
    }

    public function submit(Request $request) {
        $type = $request->type;
        $koridor = $request->koridor;
        $rute = $request->rute;
        $trip_a = $request->trip_a;
        $trip_b = $request->trip_b;
        $lngA = $request->lng_a;
        $latA = $request->lat_a;
        $lngB = $request->lng_b;
        $latB = $request->lat_b;

        try {
            DB::beginTransaction();
            if ($type == 'baru') {
                $msKoridor = new msKoridor();
                $msKoridor->koridor = $koridor;
                $msKoridor->rute = $rute;
                $msKoridor->trip_a = $trip_a;
                $msKoridor->trip_b = $trip_b;
                $msKoridor->longitude_a = $lngA;
                $msKoridor->latitude_a = $latA;
                $msKoridor->longitude_b = $lngB;
                $msKoridor->latitude_b = $latB;
                $msKoridor->save();
            } elseif ($type == 'edit') {
                DB::table('ms_koridor')
                    ->where('id','=',$request->id)
                    ->update([
                        'koridor' => $koridor,
                        'rute' => $rute,
                        'trip_a' => $trip_a,
                        'trip_b' => $trip_b,
                        'longitude_a' => $lngA,
                        'latitude_a' => $latA,
                        'longitude_b' => $lngB,
                        'latitude_b' => $latB,
                    ]);
            }
            DB::commit();
            return 'success';
        } catch (\Exception $ex) {
            DB::rollBack();
            return response()->json($ex);
        }
    }

    public function disable(Request $request) {
        $id = $request->id;
        try {
            DB::beginTransaction();
            DB::table('ms_koridor')->where('id','=',$id)
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
            DB::table('ms_koridor')->where('id','=',$id)
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
