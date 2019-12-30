<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class transaksi extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $penumpang = DB::table('ms_penumpang')->select('id','harga')->get()->keyBy('id')->toArray();
        $bus = DB::table('ms_bus')->select('id','id_koridor')->get()->keyBy('id')->toArray();
        $pembayaran = ['tiket manual','tiket offline'];
        $user = DB::table('users')->select('username')->get()->toArray();
        $shift = [1,2];
        $trip = ['AB','BA'];
        for ($i=0; $i<10; $i++) {
            $randPenumpang = array_rand($penumpang);
            $randBus = array_rand($bus);
            $randPembayaran = array_rand($pembayaran);
            $randUser = array_rand($user);
            $randShift = array_rand($shift);
            $randTrip = array_rand($trip);
            DB::table('transaksi')
                ->insert([
                    'no_transaksi' => Str::random(10),
                    'tgl_transaksi' => date('Y-m-d'),
                    'jam_transaksi' => date('H:i:s',strtotime(mt_rand(0,23).':'.mt_rand(0,59).':'.mt_rand(0,59))),
                    'id_penumpang' => $randPenumpang,
                    'id_bus' => $randBus,
                    'opsi_bayar' => $pembayaran[$randPembayaran],
                    'harga' => $penumpang[$randPenumpang]->harga,
                    'username' => $user[$randUser]->username,
                    'shift' => $shift[$randShift],
                    'id_koridor' => $bus[$randBus]->id_koridor,
                    'trip' => $trip[$randTrip],
                ]);
        }
    }
}
