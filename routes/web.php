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

$routes = [
 [
  'method' => 'get',
  'url'    => 'login',
  'act'    => 'c_Login@index',
 ],
];

foreach ($routes as $route) {
 if ($route['method'] == 'get') {
  Route::get($route['url'], $route['act'])->middleware();
 }
}

//Route::get('print/{text}',function ($text) {
//    $data['system'] = 'Trans Jateng';
//    $data['qrcode'] = $text;
//    $pdf = PDF::loadView('dashboard.print',$data)->setPaper(array(0,0,200,164),'landscape');
//    return $pdf->stream(date('Ymd').'.pdf');
//});
Route::get('payment/gopay', function () {
 return view('dashboard.gopay');
});
//Route::get('generate/qrcode/png/{text}',function ($text) {
//    $image = QRCode::format('png')
//        ->merge('assets/logo/without-name/logo-1000.png', 0.5, true)
//        ->size(500)->errorCorrection('H')
//        ->generate($text);
//    return response($image)->header('Content-type','image/png');
//});
//Route::get('generate/qrcode/svg/{text}',function ($text) {
//    $image = QRCode::format('svg')
//        ->size(500)->errorCorrection('H')
//        ->generate($text);
//    return response($image)->header('Content-type','image/svg+xml');
//});

//Route::get('login','c_Login@index');
Route::post('login/submit', 'c_Login@submit');
Route::post('logout', 'c_Login@logout');
Route::get('reset-password', 'c_Login@resetPassword');
Route::post('reset-password/submit', 'c_Login@resetPasswordSubmit');
Route::get('storage/{filename}', function ($filename) {
 return response()->file(storage_path('app/public/' . $filename));
});

Route::middleware(['check.login'])->group(function () {
 Route::get('petugas', 'c_Dashboard@petugas');
 Route::get('bus', 'c_Dashboard@bus');
 Route::get('koridor', 'c_Dashboard@koridor');
 Route::get('penumpang', 'c_Dashboard@penumpang');
 Route::get('penumpang/{id}', 'c_Dashboard@penumpangID');
 Route::get('tiket', 'c_Dashboard@tiket');
 Route::get('tiket/{id}', 'c_Dashboard@tiketID');

 Route::get('/', function () {
  return redirect('dashboard');
 });

 Route::post('dashboard/statistics', 'c_Overview@statistics');
 Route::post('dashboard/koridor-location', 'c_Overview@koridorLocation');

 Route::get('dashboard', 'c_Overview@index');
 Route::get('dashboard/profile', 'c_Profile@edit');
 Route::post('dashboard/profile/submit', 'c_Profile@submit');

 Route::middleware(['menu.permission'])->group(function () {
  Route::get('dashboard/system/menu', 'c_SysMenu@index');

  Route::get('dashboard/system/menu-group', 'c_SysMenuGroup@index');
  Route::get('dashboard/system/menu-group/list', 'c_SysMenuGroup@list');
  Route::get('dashboard/system/menu-group/list/data', 'c_SysMenuGroup@listData');
  Route::post('dashboard/system/menu-group/submit', 'c_SysMenuGroup@submit');
  Route::get('dashboard/system/menu-group/edit/{id}', 'c_SysMenuGroup@edit');

  Route::get('dashboard/system/menu', 'c_SysMenu@index');
  Route::get('dashboard/system/menu/list', 'c_SysMenu@list');
  Route::post('dashboard/system/menu/list/data', 'c_SysMenu@listData');
  Route::post('dashboard/system/menu/submit', 'c_SysMenu@submit');
  Route::get('dashboard/system/menu/edit/{id}', 'c_SysMenu@edit');
  Route::post('dashboard/system/menu/reorder', 'c_SysMenu@reorder');

  Route::get('dashboard/master/user-management', 'c_MasterUserManagement@index');
  Route::get('dashboard/master/user-management/list', 'c_MasterUserManagement@list');
  Route::post('dashboard/master/user-management/data', 'c_MasterUserManagement@data');
  Route::get('dashboard/master/user-management/edit/{username}', 'c_MasterUserManagement@edit');
  Route::post('dashboard/master/user-management/submit', 'c_MasterUserManagement@submit');
  Route::post('dashboard/master/user-management/reset-password', 'c_MasterUserManagement@resetPassword');
  Route::post('dashboard/master/user-management/disable', 'c_MasterUserManagement@disable');
  Route::post('dashboard/master/user-management/activate', 'c_MasterUserManagement@activate');

  Route::get('dashboard/master/koridor', 'c_MasterKoridor@index');
  Route::get('dashboard/master/koridor/list', 'c_MasterKoridor@list');
  Route::post('dashboard/master/koridor/data', 'c_MasterKoridor@data');
  Route::get('dashboard/master/koridor/edit/{id}', 'c_MasterKoridor@edit');
  Route::post('dashboard/master/koridor/submit', 'c_MasterKoridor@submit');
  Route::post('dashboard/master/koridor/disable', 'c_MasterKoridor@disable');
  Route::post('dashboard/master/koridor/activate', 'c_MasterKoridor@activate');

  Route::get('dashboard/master/shelter', 'c_MasterShelter@index');
  Route::get('dashboard/master/shelter/list', 'c_MasterShelter@list');
  Route::post('dashboard/master/shelter/data', 'c_MasterShelter@data');
  Route::get('dashboard/master/shelter/edit/{id}', 'c_MasterShelter@edit');
  Route::post('dashboard/master/shelter/submit', 'c_MasterShelter@submit');
  Route::post('dashboard/master/shelter/disable', 'c_MasterShelter@disable');
  Route::post('dashboard/master/shelter/activate', 'c_MasterShelter@activate');

  Route::get('dashboard/master/bus', 'c_MasterBus@index');
  Route::get('dashboard/master/bus/list', 'c_MasterBus@list');
  Route::post('dashboard/master/bus/data', 'c_MasterBus@data');
  Route::get('dashboard/master/bus/edit/{id}', 'c_MasterBus@edit');
  Route::post('dashboard/master/bus/submit', 'c_MasterBus@submit');
  Route::post('dashboard/master/bus/disable', 'c_MasterBus@disable');
  Route::post('dashboard/master/bus/activate', 'c_MasterBus@activate');

  Route::get('dashboard/master/pembayaran', 'c_MasterPembayaran@index');
  Route::get('dashboard/master/pembayaran/list', 'c_MasterPembayaran@list');
  Route::post('dashboard/master/pembayaran/data', 'c_MasterPembayaran@data');
  Route::get('dashboard/master/pembayaran/edit/{id}', 'c_MasterPembayaran@edit');
  Route::post('dashboard/master/pembayaran/submit', 'c_MasterPembayaran@submit');
  Route::post('dashboard/master/pembayaran/disable', 'c_MasterPembayaran@disable');
  Route::post('dashboard/master/pembayaran/activate', 'c_MasterPembayaran@activate');

  Route::get('dashboard/master/penumpang', 'c_MasterPenumpang@index');
  Route::get('dashboard/master/penumpang/list', 'c_MasterPenumpang@list');
  Route::post('dashboard/master/penumpang/data', 'c_MasterPenumpang@data');
  Route::get('dashboard/master/penumpang/edit/{id}', 'c_MasterPenumpang@edit');
  Route::post('dashboard/master/penumpang/submit', 'c_MasterPenumpang@submit');
  Route::post('dashboard/master/penumpang/disable', 'c_MasterPenumpang@disable');
  Route::post('dashboard/master/penumpang/activate', 'c_MasterPenumpang@activate');

  Route::get('dashboard/master/hari-libur', 'c_MasterHariLibur@index');
  Route::get('dashboard/master/hari-libur/list', 'c_MasterHariLibur@list');
  Route::post('dashboard/master/hari-libur/data', 'c_MasterHariLibur@data');
  Route::get('dashboard/master/hari-libur/edit/{tgl}', 'c_MasterHariLibur@edit');
  Route::post('dashboard/master/hari-libur/submit', 'c_MasterHariLibur@submit');
  Route::post('dashboard/master/hari-libur/delete', 'c_MasterHariLibur@delete');

  Route::get('dashboard/master/device', 'c_MasterDevice@index');
  Route::get('dashboard/master/device/list', 'c_MasterDevice@list');
  Route::post('dashboard/master/device/data', 'c_MasterDevice@data');
  Route::get('dashboard/master/device/edit/{id}', 'c_MasterDevice@edit');
  Route::post('dashboard/master/device/submit', 'c_MasterDevice@submit');
  Route::post('dashboard/master/device/disable', 'c_MasterDevice@disable');
  Route::post('dashboard/master/device/activate', 'c_MasterDevice@activate');

  Route::get('dashboard/master/tiket', 'c_MasterTiket@index');
  Route::get('dashboard/master/tiket/list', 'c_MasterTiket@list');
  Route::post('dashboard/master/tiket/data', 'c_MasterTiket@data');
  Route::get('dashboard/master/tiket/edit/{id}', 'c_MasterTiket@edit');
  Route::post('dashboard/master/tiket/submit', 'c_MasterTiket@submit');
  Route::post('dashboard/master/tiket/disable', 'c_MasterTiket@disable');
  Route::post('dashboard/master/tiket/activate', 'c_MasterTiket@activate');

  Route::get('dashboard/laporan/monitoring-penumpang', 'c_MonitoringPenumpang@index');
  Route::post('dashboard/laporan/monitoring-penumpang/data', 'c_MonitoringPenumpang@data');
  Route::get('dashboard/laporan/monitoring-penumpang/export/pdfpagi/{tgl}', 'c_MonitoringPenumpang@exportPDFpagi');
  Route::get('dashboard/laporan/monitoring-penumpang/export/pdfsore/{tgl}', 'c_MonitoringPenumpang@exportPDFsore');

  Route::get('dashboard/laporan/transaksi-petugas', 'c_LaporanTransaksiPetugas@index');
  Route::post('dashboard/laporan/transaksi-petugas/data', 'c_LaporanTransaksiPetugas@data');
  Route::get('dashboard/laporan/transaksi-petugas/export/pdf/{tgl}', 'c_LaporanTransaksiPetugas@exportPDF');
  Route::get('dashboard/laporan/transaksi-petugas/export-detail/pdf/{tgl}/{username}', 'c_LaporanTransaksiPetugas@exportDetailPetugasPDF');

  Route::get('dashboard/laporan/top-transaksi-petugas', 'c_LaporanTopTransaksiPetugas@index');
  Route::post('dashboard/laporan/top-transaksi-petugas/data', 'c_LaporanTopTransaksiPetugas@data');
  Route::get('dashboard/laporan/top-transaksi-petugas/export/pdf/{tgl}', 'c_LaporanTopTransaksiPetugas@exportPDF');

  Route::get('dashboard/laporan/transaksi-per-jenis', 'c_LaporanTransaksiPerJenis@index');
  Route::post('dashboard/laporan/transaksi-per-jenis/data', 'c_LaporanTransaksiPerJenis@data');
  Route::post('dashboard/laporan/transaksi-per-jenis/data-offline', 'c_LaporanTransaksiPerJenis@dataOffline');
  Route::get('dashboard/laporan/transaksi-per-jenis/export/pdf/{tgl}', 'c_LaporanTransaksiPerJenis@exportPDF');

  Route::get('dashboard/laporan/transaksi-per-koridor', 'c_LaporanTransaksiPerKoridor@index');
  Route::post('dashboard/laporan/transaksi-per-koridor/data', 'c_LaporanTransaksiPerKoridor@data');
  Route::get('dashboard/laporan/transaksi-per-koridor/export/pdf/{tgl}', 'c_LaporanTransaksiPerKoridor@exportPDF');

  Route::get('dashboard/laporan/transaksi-bus-shelter', 'c_LaporanTransaksiBusShelter@index');
  Route::post('dashboard/laporan/transaksi-bus-shelter/data', 'c_LaporanTransaksiBusShelter@data');
  Route::get('dashboard/laporan/transaksi-bus-shelter/export/pdf/{tgl}', 'c_LaporanTransaksiBusShelter@exportPDF');

  Route::get('dashboard/penjualan/tiket-offline', 'c_PenjualanTiketOffline@index');
  Route::post('dashboard/penjualan/tiket-offline/submit', 'c_PenjualanTiketOffline@submit');

  Route::get('dashboard/problem/bus-report', 'c_ProblemBusReport@index');
  Route::post('dashboard/problem/bus-report/data', 'c_ProblemBusReport@data');
  Route::get('dashboard/problem/bus-report/view/{id}', 'c_ProblemBusReport@detail');
 });
});
