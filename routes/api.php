<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('koridor',function () {
    $koridor = [];
    if (isset($_GET['search'])) {
        $koridor['results'] = DB::table('ms_koridor')
            ->select('id','koridor as text','koridor as koridor','rute','trip_a','trip_b')
            ->where('koridor','like','%'.$_GET['search'].'%')
            ->orderBy('koridor','asc')
            ->get();
    } else {
        $koridor['results'] = DB::table('ms_koridor')
            ->select('id','koridor as text','koridor as koridor','rute','trip_a','trip_b')
            ->orderBy('koridor','asc')
            ->get();
    }
    return $koridor;
});

Route::get('bus',function () {
    $koridor = [];
    if (isset($_GET['search'])) {
        $koridor['results'] = DB::table('ms_bus')
            ->select('id','nama as text','merk','no_pol','id_koridor')
            ->where('nama','like','%'.$_GET['search'].'%')
            ->orderBy('nama','asc')
            ->get();
    } else {
        $koridor['results'] = DB::table('ms_bus')
            ->select('id','nama as text','merk','no_pol','id_koridor')
            ->orderBy('nama','asc')
            ->get();
    }
    return $koridor;
});

Route::get('penumpang',function () {
    $date = date('Y-m-d');
    $Penumpang = [];
    if (isset($_GET['search'])) {
        $Penumpang['results'] = DB::table('ms_penumpang')
            ->select('id','jenis as text','harga')
            ->where('jenis','like','%'.$_GET['search'].'%')
            ->whereNotIn('id',DB::table('ms_libur')->where('tanggal','=',$date)->pluck('id_penumpang'))
            ->orderBy('jenis','asc')
            ->get();
    } else {
        $Penumpang['results'] = DB::table('ms_penumpang')
            ->select('id','jenis as text','harga')
            ->whereNotIn('id',DB::table('ms_libur')->where('tanggal','=',$date)->pluck('id_penumpang'))
            ->orderBy('jenis','asc')
            ->get();
    }
    return $Penumpang;
});
Route::get('penumpang/{id}',function ($id) {
    $dtPenumpang = DB::table('ms_penumpang')->select('harga')->where('id','=',$id)->first();
    return $dtPenumpang->harga;
});

Route::post('login','c_Android@login');
Route::post('sync','c_Android@sync');
Route::post('problem','c_Android@problemReport');
