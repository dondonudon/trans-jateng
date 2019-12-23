<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class sysMenu extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'id_group' => '1',
                'name' => 'Company Info',
                'segment_name' => 'company-info',
                'url' => 'dashboard/system/company-info',
                'ord' => '1',
                'status' => '0',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id_group' => '1',
                'name' => 'Menu Group',
                'segment_name' => 'menu-group',
                'url' => 'dashboard/system/menu-group',
                'ord' => '2',
                'status' => '0',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id_group' => '1',
                'name' => 'Menu',
                'segment_name' => 'menu',
                'url' => 'dashboard/system/menu',
                'ord' => '3',
                'status' => '0',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id_group' => '2',
                'name' => 'User Management',
                'segment_name' => 'user-management',
                'url' => 'dashboard/master/user-management',
                'ord' => '1',
                'status' => '0',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id_group' => '2',
                'name' => 'koridor',
                'segment_name' => 'koridor',
                'url' => 'dashboard/master/koridor',
                'ord' => '2',
                'status' => '0',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id_group' => '2',
                'name' => 'Bus',
                'segment_name' => 'bus',
                'url' => 'dashboard/master/bus',
                'ord' => '3',
                'status' => '0',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id_group' => '2',
                'name' => 'Penumpang',
                'segment_name' => 'penumpang',
                'url' => 'dashboard/master/penumpang',
                'ord' => '4',
                'status' => '0',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id_group' => '2',
                'name' => 'Hari Libur',
                'segment_name' => 'hari-libur',
                'url' => 'dashboard/master/hari-libur',
                'ord' => '5',
                'status' => '0',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id_group' => '2',
                'name' => 'Device',
                'segment_name' => 'device',
                'url' => 'dashboard/master/device',
                'ord' => '6',
                'status' => '0',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id_group' => '3',
                'name' => 'Tiket Offline',
                'segment_name' => 'tiket-offline',
                'url' => 'dashboard/penjualan/tiket-offline',
                'ord' => '1',
                'status' => '0',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id_group' => '4',
                'name' => 'Bus Report',
                'segment_name' => 'bus-report',
                'url' => 'dashboard/penjualan/bus-report',
                'ord' => '1',
                'status' => '0',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];
        foreach ($data as $d) {
            DB::table('sys_menus')->insert($d);
        }
    }
}
