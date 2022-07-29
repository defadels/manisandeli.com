<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProdukController;
use App\Http\Controllers\Admin\Pengaturan\MetodePembayaranController;

use App\Http\Controllers\Owner\OwnerController;


use App\Http\Controllers\Website\HomeController;
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

// Normal laravel homepage
// Route::get('/', function () {
//     return view('welcome');
// });

//My own project pages
Route::name('website.')->namespace('Website')->group(function(){
    Route::get('/', [HomeController::class, 'index'])->name('home');
});


Route::prefix('owner')->name('owner.')->middleware('auth', 'reject_except_owner')->namespace('Owner')->group(function(){
    Route::get('/', [OwnerController::class, 'index'])->name('dashboard');
});

Route::prefix('admin')->name('admin.')->middleware('auth', 'reject_except_admin')->namespace('Admin')->group(function(){
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');

    Route::get('/produk', [ProdukController::class, 'index'])->name('produk');
    Route::get('/produk/tambah', [ProdukController::class, 'create'])->name('produk.create');
    Route::post('/produk', [ProdukController::class, 'store'])->name('produk.store');
    Route::get('/produk/edit/{produk}', [ProdukController::class, 'edit'])->name('produk.edit');
    Route::put('/produk/edit/{produk}', [ProdukController::class, 'update'])->name('produk.update');
    Route::get('/produk/show/{produk}', [ProdukController::class, 'show'])->name('produk.show');
    Route::delete('/produk/edit/{produk}', [ProdukController::class, 'destroy'])->name('produk.destroy');

    Route::prefix('pengaturan')->name('pengaturan.')->namespace('Pengaturan')->group(function(){
        Route::get('/metode-pembayaran', [MetodePembayaranController::class, 'index'])->name('pembayaran');
        Route::get('/metode-pembayaran/tambah', [MetodePembayaranController::class, 'create'])->name('pembayaran.create');
        Route::post('/metode-pembayaran', [MetodePembayaranController::class, 'store'])->name('pembayaran.store');
        Route::get('/metode-pembayaran/edit/{pembayaran}', [MetodePembayaranController::class, 'edit'])->name('pembayaran.edit');
        Route::put('/metode-pembayaran/edit/{pembayaran}', [MetodePembayaranController::class, 'update'])->name('pembayaran.update');
        Route::delete('/metode-pembayaran/edit/{pembayaran}', [MetodePembayaranController::class, 'destroy'])->name('pembayaran.destroy');
        Route::get('/metode-pembayaran/show/{pembayaran}', [MetodePembayaranController::class, 'show'])->name('pembayaran.show');
    });
});

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
