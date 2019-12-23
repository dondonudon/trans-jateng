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

Route::get('payment/gopay',function () {
    return view('dashboard.gopay');
});
Route::get('login','c_Login@index');
Route::post('login/submit','c_Login@submit');
Route::post('logout','c_Login@logout');
Route::get('reset-password','c_Login@resetPassword');
Route::post('reset-password/submit','c_Login@resetPasswordSubmit');
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
        Route::post('dashboard/master/user-management/data','c_MasterUserManagement@data');
        Route::get('dashboard/master/user-management/edit/{username}','c_MasterUserManagement@edit');
        Route::post('dashboard/master/user-management/submit','c_MasterUserManagement@submit');
        Route::post('dashboard/master/user-management/reset-password','c_MasterUserManagement@resetPassword');
        Route::post('dashboard/master/user-management/disable','c_MasterUserManagement@disable');
        Route::post('dashboard/master/user-management/activate','c_MasterUserManagement@activate');

        Route::get('dashboard/master/koridor','c_MasterKoridor@index');
        Route::get('dashboard/master/koridor/list','c_MasterKoridor@list');
        Route::post('dashboard/master/koridor/data','c_MasterKoridor@data');
        Route::get('dashboard/master/koridor/edit/{id}','c_MasterKoridor@edit');
        Route::post('dashboard/master/koridor/submit','c_MasterKoridor@submit');
        Route::post('dashboard/master/koridor/disable','c_MasterKoridor@disable');
        Route::post('dashboard/master/koridor/activate','c_MasterKoridor@activate');

        Route::get('dashboard/master/bus','c_MasterBus@index');
        Route::get('dashboard/master/bus/list','c_MasterBus@list');
        Route::post('dashboard/master/bus/data','c_MasterBus@data');
        Route::get('dashboard/master/bus/edit/{id}','c_MasterBus@edit');
        Route::post('dashboard/master/bus/submit','c_MasterBus@submit');
        Route::post('dashboard/master/bus/disable','c_MasterBus@disable');
        Route::post('dashboard/master/bus/activate','c_MasterBus@activate');

        Route::get('dashboard/master/penumpang','c_MasterPenumpang@index');
        Route::get('dashboard/master/penumpang/list','c_MasterPenumpang@list');
        Route::post('dashboard/master/penumpang/data','c_MasterPenumpang@data');
        Route::get('dashboard/master/penumpang/edit/{id}','c_MasterPenumpang@edit');
        Route::post('dashboard/master/penumpang/submit','c_MasterPenumpang@submit');
        Route::post('dashboard/master/penumpang/disable','c_MasterPenumpang@disable');
        Route::post('dashboard/master/penumpang/activate','c_MasterPenumpang@activate');

        Route::get('dashboard/master/hari-libur','c_MasterHariLibur@index');
        Route::get('dashboard/master/hari-libur/list','c_MasterHariLibur@list');
        Route::post('dashboard/master/hari-libur/data','c_MasterHariLibur@data');
        Route::get('dashboard/master/hari-libur/edit/{tgl}','c_MasterHariLibur@edit');
        Route::post('dashboard/master/hari-libur/submit','c_MasterHariLibur@submit');
        Route::post('dashboard/master/hari-libur/delete','c_MasterHariLibur@delete');

        Route::get('dashboard/master/device','c_MasterDevice@index');
        Route::get('dashboard/master/device/list','c_MasterDevice@list');
        Route::post('dashboard/master/device/data','c_MasterDevice@data');
        Route::get('dashboard/master/device/edit/{id}','c_MasterDevice@edit');
        Route::post('dashboard/master/device/submit','c_MasterDevice@submit');
        Route::post('dashboard/master/device/disable','c_MasterDevice@disable');
        Route::post('dashboard/master/device/activate','c_MasterDevice@activate');

        Route::get('dashboard/penjualan/tiket-offline','c_PenjualanTiketOffline@index');
        Route::post('dashboard/penjualan/tiket-offline/submit','c_PenjualanTiketOffline@submit');
    });
});
