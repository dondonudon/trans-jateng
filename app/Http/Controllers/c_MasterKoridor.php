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
        $data['data'] = msKoridor::all();
        return json_encode($data);
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
        $lng = $request->lng;
        $lat = $request->lat;

        try {
            DB::beginTransaction();
            if ($type == 'baru') {
                $msKoridor = new msKoridor();
                $msKoridor->koridor = $koridor;
                $msKoridor->rute = $rute;
                $msKoridor->trip_a = $trip_a;
                $msKoridor->trip_b = $trip_b;
                $msKoridor->longitude = $lng;
                $msKoridor->latitude = $lat;
                $msKoridor->save();
            } elseif ($type == 'edit') {
                DB::table('ms_koridor')
                    ->where('id','=',$request->id)
                    ->update([
                        'koridor' => $koridor,
                        'rute' => $rute,
                        'trip_a' => $trip_a,
                        'trip_b' => $trip_b,
                        'longitude' => $lng,
                        'latitude' => $lat,
                    ]);
            }
            DB::commit();
            return 'success';
        } catch (\Exception $ex) {
            DB::rollBack();
            return response()->json($ex);
        }
    }
}
