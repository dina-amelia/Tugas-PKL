<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes(
    [
        'register' => false,
    ]
);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    Route::get('/home')->middleware(['role:admin'])->name('home');
    Route::resource('supplier', SupplierController::class)->middleware(['role:admin']);
    Route::resource('barangmasuk', BarangMasukController::class)->middleware(['role:admin']);
    Route::resource('barangkeluar', BarangKeluarController::class)->middleware(['role:admin']);
    Route::resource('pengelola', BarangController::class)->middleware(['role:admin']);
    Route::resource('pesanan', PesananController::class)->middleware(['role:admin']);
    Route::resource('transaksi', PembayaranController::class)->middleware(['role:admin']);
    Route::get('cetak-laporan', [ReportController::class, 'pesanan'])->name('getPesanan');
    Route::post('cetak-laporan', [ReportController::class, 'reportPesanan'])->name('reportPesanan');
    Route::post('/laporan/pesanan/export/', [PesananController::class, 'export_excel']);
});

// Route::group(['prefix' => 'admin', 'middleware'=> ['auth']], function(){
//     Route::get('/home', function(){
//         return 'halaman admin';
//     });

//     Route::get('profile', function(){
//         return 'halaman profile admin';
//     });
// });

// //hanya untuk role pengguna
// Route::group(['prefix'=>'pengguna','middleware' => ['auth', 'role:pengguna']], function(){
//     Route::get('/user', function(){
//         return 'halaman pengguna';
//     });

//     Route::get('profile', function(){
//         return 'halaman profile pengguna';
//     });
// });

// Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function(){
//     Route::get('barang', function(){
//         return view('pengelola.index');
//     })->middleware(['role:admin|pengguna']);
// });

// Route::resource('admin/pengelola', BarangController::class);

// Route::resource('admin/pesanan', PesananController::class);

// Route::resource('admin/transaksi', PembayaranController::class);

// Route::get('admin/laporan', PembayaranController::class);

// Route::get('admin/laporan', [PembayaranController::class, "laporan"]);

Route::get('/user', function () {
    return view('frontend.home');
});

Route::get('/shop', function () {
    return view('frontend.shop');
});

Route::get('/detail', function () {
    return view('frontend.detail');
});

Route::get('/cart', function () {
    return view('frontend.cart');
});

Route::get('/checkout', function () {
    return view('frontend.checkout');
});

Route::get('/contact', function () {
    return view('frontend.contact');
});
