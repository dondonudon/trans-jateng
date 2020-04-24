<?php

namespace App\Http\Controllers;

use App\muatanBus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class c_MonitoringPenumpang extends Controller
{
    /*
     * Dataset
     */
    public function dataset($tgl) {
        $data = [];
        try {
            $shelters = DB::table('master_shelter')
            ->where([
                ['status','=',1],
            ])
            ->get();
            
            foreach ($shelters as $shelter) {
                $dt = new \stdClass();
                //shift pagi
                $Upagi = DB::table('muatan_bus')
                            ->select(DB::raw('SUM(total) as count'))
                            ->where([
                                ['id_shelter','=',$shelter->id],
                                ['tanggal','=',$tgl],
                                ['idPenumpang','=',1],
                                ['shift','=',1],
                            ])
                            ->first();
                $Bpagi = DB::table('muatan_bus')
                            ->select(DB::raw('SUM(total) as count'))
                            ->where([
                                ['id_shelter','=',$shelter->id],
                                ['tanggal','=',$tgl],
                                ['idPenumpang','=',4],
                                ['shift','=',1],
                            ])
                            ->first();
                $Vpagi = DB::table('muatan_bus')
                            ->select(DB::raw('SUM(total) as count'))
                            ->where([
                                ['id_shelter','=',$shelter->id],
                                ['tanggal','=',$tgl],
                                ['idPenumpang','=',2],
                                ['shift','=',1],
                            ])
                            ->first();
                $Ppagi = DB::table('muatan_bus')
                            ->select(DB::raw('SUM(total) as count'))
                            ->where([
                                ['id_shelter','=',$shelter->id],
                                ['tanggal','=',$tgl],
                                ['idPenumpang','=',3],
                                ['shift','=',1],
                            ])
                            ->first();
                $Tpagi = DB::table('muatan_bus')
                            ->select(DB::raw('SUM(total) as count'))
                            ->where([
                                ['id_shelter','=',$shelter->id],
                                ['tanggal','=',$tgl],
                                ['arah','=',2],
                                ['shift','=',1],
                            ])
                            ->first();
                $Allpagi = DB::table('muatan_bus')
                        ->select(DB::raw('SUM(total) as count'))
                        ->where([
                            ['tanggal','=',$tgl],
                            ['arah','=',1],
                            ['idPenumpang','!=',99],
                            ['shift','=',1],
                        ])
                        ->first();
                //shift sore
                $Usore = DB::table('muatan_bus')
                            ->select(DB::raw('SUM(total) as count'))
                            ->where([
                                ['id_shelter','=',$shelter->id],
                                ['tanggal','=',$tgl],
                                ['idPenumpang','=',1],
                                ['shift','=',2],
                            ])
                            ->first();
                $Bsore = DB::table('muatan_bus')
                            ->select(DB::raw('SUM(total) as count'))
                            ->where([
                                ['id_shelter','=',$shelter->id],
                                ['tanggal','=',$tgl],
                                ['idPenumpang','=',4],
                                ['shift','=',2],
                            ])
                            ->first();
                $Vsore = DB::table('muatan_bus')
                            ->select(DB::raw('SUM(total) as count'))
                            ->where([
                                ['id_shelter','=',$shelter->id],
                                ['tanggal','=',$tgl],
                                ['idPenumpang','=',2],
                                ['shift','=',2],
                            ])
                            ->first();
                $Psore = DB::table('muatan_bus')
                            ->select(DB::raw('SUM(total) as count'))
                            ->where([
                                ['id_shelter','=',$shelter->id],
                                ['tanggal','=',$tgl],
                                ['idPenumpang','=',3],
                                ['shift','=',2],
                            ])
                            ->first();
                $Tsore = DB::table('muatan_bus')
                            ->select(DB::raw('SUM(total) as count'))
                            ->where([
                                ['id_shelter','=',$shelter->id],
                                ['tanggal','=',$tgl],
                                ['arah','=',2],
                                ['shift','=',2],
                            ])
                            ->first();
                $Allsore = DB::table('muatan_bus')
                            ->select(DB::raw('SUM(total) as count'))
                            ->where([
                                ['tanggal','=',$tgl],
                                ['arah','=',1],
                                ['idPenumpang','!=',99],
                                ['shift','=',2],
                            ])
                            ->first();
                $dt->nama = $shelter->nama;
                $dt->Upagi = $Upagi->count;
                $dt->Bpagi = $Bpagi->count;
                $dt->Vpagi = $Vpagi->count;
                $dt->Ppagi = $Ppagi->count;
                $dt->Tpagi = $Tpagi->count;
                $dt->Allpagi = $Allpagi->count;

                $dt->Usore = $Usore->count;
                $dt->Bsore = $Bsore->count;
                $dt->Vsore = $Vsore->count;
                $dt->Psore = $Psore->count;
                $dt->Tsore = $Tsore->count;
                $dt->Allsore = $Allsore->count;
                
                $data[] = $dt;
            }

            

            return $data;
            
            
        } catch (\Exception $ex) {
            return response()->json([$ex]);
        }
    }

    public function index() {
        return view('dashboard.laporan.monitoring-penumpang.index');
    }

    public function data(Request $request) {
        $tgl = $request->tanggal;
        try {
            return $this->dataset($tgl);
        } catch (\Exception $ex) {
            return response()->json([$ex]);
        }
    }

    public function exportPDFpagi($tgl) {
        try {
            $trn['data'] = $this->dataset($tgl);
            $pdf = PDF::loadView('dashboard.laporan.monitoring-penumpang.pdfpagi',$trn)->setPaper('a4','portrait');
            return $pdf->stream('report.pdf');
        } catch (\Exception $ex) {
            return response()->json($ex);
        }
    }

    public function exportPDFsore($tgl) {
        try {
            $trn['data'] = $this->dataset($tgl);
            $pdf = PDF::loadView('dashboard.laporan.monitoring-penumpang.pdfsore',$trn)->setPaper('a4','portrait');
            return $pdf->stream('report.pdf');
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
            $pdf = PDF::loadView('dashboard.laporan.monitoring-penumpang.pdf-detail',$trn)
                ->setPaper('a4','portrait');
            return $pdf->stream('laporan-monitoring-penumpang.pdf');
        } catch (\Exception $ex) {
            dd('Exception Block',$ex);
        }
    }
}
