<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::prefix('admin')->namespace('Admin')->group(function(){
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
