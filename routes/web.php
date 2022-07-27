<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProdukController;
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
});

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
