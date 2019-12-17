<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

Route::get('login','c_Login@index');
Route::post('login/submit','c_Login@submit');
Route::get('logout','c_Login@logout');
Route::get('storage/{filename}',function ($filename) {
    return response()->file(storage_path('app/public/'.$filename));
});

Route::middleware(['check.login'])->group(function () {
    Route::get('/', function () {
        return redirect('dashboard');
    });

    Route::get('dashboard','c_Overview@index');
    Route::get('dashboard/profile','c_Profile@edit');
    Route::post('dashboard/profile/submit','c_Profile@submit');

    Route::middleware(['menu.permission'])->group(function () {
        Route::get('dashboard/system/menu','c_SysMenu@index');

        Route::get('dashboard/system/menu-group','c_SysMenuGroup@index');
        Route::get('dashboard/system/menu-group/list','c_SysMenuGroup@list');
        Route::get('dashboard/system/menu-group/list/data','c_SysMenuGroup@listData');
        Route::post('dashboard/system/menu-group/submit','c_SysMenuGroup@submit');
        Route::get('dashboard/system/menu-group/edit/{id}','c_SysMenuGroup@edit');

        Route::get('dashboard/system/menu','c_SysMenu@index');
        Route::get('dashboard/system/menu/list','c_SysMenu@list');
        Route::get('dashboard/system/menu/list/data','c_SysMenu@listData');
        Route::post('dashboard/system/menu/submit','c_SysMenu@submit');
        Route::get('dashboard/system/menu/edit/{id}','c_SysMenu@edit');

        Route::get('dashboard/master/user-management','c_MasterUserManagement@index');
        Route::get('dashboard/master/user-management/list','c_MasterUserManagement@list');
        Route::get('dashboard/master/user-management/data','c_MasterUserManagement@data');
        Route::get('dashboard/master/user-management/edit/{username}','c_MasterUserManagement@edit');
        Route::post('dashboard/master/user-management/submit','c_MasterUserManagement@submit');

        Route::get('dashboard/master/koridor','c_MasterKoridor@index');
        Route::get('dashboard/master/koridor/list','c_MasterKoridor@list');
        Route::get('dashboard/master/koridor/data','c_MasterKoridor@data');
        Route::get('dashboard/master/koridor/edit/{id}','c_MasterKoridor@edit');
        Route::post('dashboard/master/koridor/submit','c_MasterKoridor@submit');

        Route::get('dashboard/master/bus','c_MasterBus@index');
        Route::get('dashboard/master/bus/list','c_MasterBus@list');
        Route::get('dashboard/master/bus/data','c_MasterBus@data');
        Route::get('dashboard/master/bus/edit/{id}','c_MasterBus@edit');
        Route::post('dashboard/master/bus/submit','c_MasterBus@submit');

        Route::get('dashboard/master/penumpang','c_MasterPenumpang@index');
        Route::get('dashboard/master/penumpang/list','c_MasterPenumpang@list');
        Route::get('dashboard/master/penumpang/data','c_MasterPenumpang@data');
        Route::get('dashboard/master/penumpang/edit/{id}','c_MasterPenumpang@edit');
        Route::post('dashboard/master/penumpang/submit','c_MasterPenumpang@submit');

        Route::get('dashboard/master/hari-libur','c_MasterHariLibur@index');
        Route::get('dashboard/master/hari-libur/list','c_MasterHariLibur@list');
        Route::post('dashboard/master/hari-libur/data','c_MasterHariLibur@data');
        Route::get('dashboard/master/hari-libur/edit/{tgl}','c_MasterHariLibur@edit');
        Route::post('dashboard/master/hari-libur/submit','c_MasterHariLibur@submit');

        Route::get('dashboard/penjualan/tiket-offline','c_PenjualanTiketOffline@index');
    });
});
