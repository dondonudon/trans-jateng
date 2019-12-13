<?php

namespace App\Http\Controllers;

use App\msBus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class c_MasterBus extends Controller
{
    public function index() {
        return view('dashboard.master-data.bus.baru');
    }

    public function list() {
        return view('dashboard.master-data.bus.list');
    }

    public function data() {
        $data['data'] = DB::table('ms_bus')
            ->select('ms_bus.id','ms_koridor.koridor','nama','merk','no_pol','ms_bus.longitude','ms_bus.latitude')
            ->join('ms_koridor','ms_bus.id_koridor','=','ms_koridor.id')
            ->get();
        return json_encode($data);
    }

    public function edit($id) {
        $data = DB::table('ms_bus')
            ->select('ms_bus.id','ms_bus.id_koridor','ms_koridor.koridor','nama','merk','no_pol','ms_bus.longitude','ms_bus.latitude')
            ->join('ms_koridor','ms_bus.id_koridor','=','ms_koridor.id')
            ->where('ms_bus.id','=',$id)
            ->first();
        return view('dashboard.master-data.bus.edit')->with('data',$data);
    }

    public function submit(Request $request) {
        $type = $request->type;
        $koridor = $request->koridor;
        $nama = $request->nama;
        $merk = $request->merk;
        $noPol = $request->no_pol;

        try {
            DB::beginTransaction();
            if ($type == 'baru') {
                $msBus = new msBus();
                $msBus->id_koridor = $koridor;
                $msBus->nama = $nama;
                $msBus->merk = $merk;
                $msBus->no_pol = $noPol;
                $msBus->save();
            } elseif ($type == 'edit') {
                DB::table('ms_bus')
                    ->where('id','=',$request->id)
                    ->update([
                        'id_koridor' => $koridor,
                        'nama' => $nama,
                        'merk' => $merk,
                        'no_pol' => $noPol,
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
