<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\LaporanController;




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
    return view('welcome');
});

Auth::routes(
    [
        'register' => false
    ]
);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Route::group(['prefix' => 'admin', 'middleware'=> ['auth','role:admin']], function(){
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


Route::resource('admin/pengelola',BarangController::class);

Route::resource('admin/pesanan',PesananController::class);

Route::resource('admin/transaksi',PembayaranController::class);

Route::resource('admin/laporan',LaporanController::class);

Route::get('/user', function() {
    return view('frontend.home');
});

Route::get('/shop', function() {
    return view('frontend.shop');
});

Route::get('/detail', function() {
    return view('frontend.detail');
});

Route::get('/cart', function() {
    return view('frontend.cart');
});

Route::get('/checkout', function() {
    return view('frontend.checkout');
});

Route::get('/contact', function() {
    return view('frontend.contact');
});






