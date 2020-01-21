<?php

namespace App\Http\Controllers;

use App\masterShelter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Output\ConsoleOutput;

class c_MasterShelter extends Controller
{
    public function index() {
        return view('dashboard.master-data.shelter.baru');
    }

    public function list() {
        return view('dashboard.master-data.shelter.list');
    }

    public function data(Request $request) {
        $filters = $request->filters;
        $data = [
            'where' => []
        ];
        if ($filters !== null) {
            foreach ($filters as $f) {
                $data['where'][] = [
                    $f['field'],$f['type'],'%'.$f['value'].'%'
                ];
            }
        }
        return DB::table('master_shelter')
            ->select('master_shelter.id','master_shelter.status','ms_koridor.koridor','master_shelter.nama','master_shelter.lokasi','master_shelter.longitude','master_shelter.latitude')
            ->leftJoin('ms_koridor','master_shelter.id_koridor','=','ms_koridor.id')
            ->where($data['where'])
            ->paginate(8);
    }

    public function edit($id) {
        $data = DB::table('master_shelter')
            ->select('master_shelter.id','master_shelter.status','master_shelter.id_koridor','ms_koridor.koridor','master_shelter.nama','master_shelter.lokasi','master_shelter.longitude','master_shelter.latitude')
            ->leftJoin('ms_koridor','master_shelter.id_koridor','=','ms_koridor.id')
            ->where('master_shelter.id','=',$id)->first();
        return view('dashboard.master-data.shelter.edit')->with('data',$data);
    }

    public function submit(Request $request) {
        $result = [
            'status' => '',
            'message' => ''
        ];
        $type = $request->type;
        $id = $request->id ?? null;
        $idKoridor = $request->id_koridor;
        $nama = $request->nama;
        $lokasi = $request->lokasi;
        $lng = $request->lng;
        $lat = $request->lat;

        try {
            DB::beginTransaction();
            if ($type == 'baru') {
                $SHELTER = DB::table('master_shelter')->where('nama','=',$nama);
                if ($SHELTER->doesntExist()) {
                    $msShelter = new masterShelter();
                    $msShelter->id_koridor = $idKoridor;
                    $msShelter->nama = $nama;
                    $msShelter->lokasi = $lokasi;
                    $msShelter->longitude = $lng;
                    $msShelter->latitude = $lat;
                    $msShelter->save();
                    $result['status'] = 'success';
                } else {
                    $result['status'] = 'failed';
                    $result['message'] = 'Nama shelter '.$nama.' sudah terdaftar';
                }
            } elseif ($type == 'edit') {
                DB::table('master_shelter')
                    ->where('id','=',$id)
                    ->update([
                        'id_koridor' => $idKoridor,
                        'nama' => $nama,
                        'lokasi' => $lokasi,
                        'longitude' => $lng,
                        'latitude' => $lat,
                    ]);
                $result['status'] = 'success';
            }
            DB::commit();
            return $result;
        } catch (\Exception $ex) {
            DB::rollBack();
            return response()->json($ex);
        }
    }

    public function disable(Request $request) {
        $id = $request->id;
        try {
            DB::beginTransaction();
            DB::table('master_shelter')->where('id','=',$id)
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
            DB::table('master_shelter')->where('id','=',$id)
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
