<?php

use Illuminate\Support\Facades\Route;

// Controller

    // Admin Controller
    use App\Http\Controllers\Admin\AdminController;
    use App\Http\Controllers\Admin\ProdukController;
    use App\Http\Controllers\Admin\Pengaturan\MetodePembayaranController;
    use App\Http\Controllers\Admin\Pengaturan\SosmedController;
    use App\Http\Controllers\Admin\Pengaturan\ProfilTokoController;

    // Owner Controller
    use App\Http\Controllers\Owner\OwnerController;

    // Frontend Controller
    use App\Http\Controllers\Website\HomeController;
    use App\Http\Controllers\SocialiteController;


// Laravel Livewire Module

    // Website Livewire
    use App\Http\Livewire\Website\ProfileUser;
    use App\Http\Livewire\Website\ProdukComponent;
    use App\Http\Livewire\Website\DetailProduk;
    use App\Http\Livewire\Website\TentangKami;
    use App\Http\Livewire\Website\HomeComponent;
    use App\Http\Livewire\Website\CheckoutComponent;
    use App\Http\Livewire\Website\KonfirmasiComponent;


    // Admin Livewire
    use App\Http\Livewire\Admin\SosmedToko;
    use App\Http\Livewire\Admin\ProfilTokoUpdate;
    use App\Http\Livewire\Admin\EditProfileUser;
    use App\Http\Livewire\Admin\EditProfieUserUpdate;
    use App\Http\Livewire\Admin\UserIndexComponent;
    use App\Http\Livewire\Admin\PelangganComponent;
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
Route::middleware('auth')->group(function(){
    Route::get('/', HomeComponent::class)->name('website.home');
    Route::get('/{id}/profile-user', ProfileUser::class)->name('website.profile.user');
    
    Route::get('/tentang-kami', TentangKami::class)->name('website.tentang');
    
    Route::get('/produk', ProdukComponent::class)->name('website.produk');
    Route::get('/produk/{id}/detail-produk', DetailProduk::class)->name('website.detail.produk');

    Route::get('/checkout', CheckoutComponent::class)->name('website.checkout');
    Route::get('/terima-kasih', KonfirmasiComponent::class)->name('website.konfirmasi');

});


Route::prefix('owner')->name('owner.')->middleware('auth', 'reject_except_owner')->namespace('Owner')->group(function(){
    Route::get('/', [OwnerController::class, 'index'])->name('dashboard');
});

Route::middleware('auth', 'reject_except_admin')->group(function(){
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');

    Route::get('/admin/pelanggan', PelangganComponent::class)->name('admin.pelanggan');
    Route::get('/admin/pelanggan/alamat', PelangganComponent::class)->name('admin.pelanggan.alamat');
    Route::get('/admin/pelanggan/keranjang', PelangganComponent::class)->name('admin.pelanggan.keranjang');

    Route::get('admin/produk', [ProdukController::class, 'index'])->name('admin.produk');
    Route::get('admin/produk/tambah', [ProdukController::class, 'create'])->name('admin.produk.create');
    Route::post('admin/produk', [ProdukController::class, 'store'])->name('admin.produk.store');
    Route::get('admin/produk/edit/{produk}', [ProdukController::class, 'edit'])->name('admin.produk.edit');
    Route::put('admin/produk/edit/{produk}', [ProdukController::class, 'update'])->name('admin.produk.update');
    Route::get('admin/produk/show/{produk}', [ProdukController::class, 'show'])->name('admin.produk.show');
    Route::delete('admin/produk/edit/{produk}', [ProdukController::class, 'destroy'])->name('admin.produk.destroy');
        
        
        // Metode Pemabayran Routes
        Route::get('admin/pengaturan/metode-pembayaran', [MetodePembayaranController::class, 'index'])->name('admin.pengaturan.pembayaran');
        Route::get('admin/pengaturan/metode-pembayaran/tambah', [MetodePembayaranController::class, 'create'])->name('admin.pengaturan.pembayaran.create');
        Route::post('admin/pengaturan/metode-pembayaran', [MetodePembayaranController::class, 'store'])->name('admin.pengaturan.pembayaran.store');
        Route::get('admin/pengaturan/metode-pembayaran/edit/{pembayaran}', [MetodePembayaranController::class, 'edit'])->name('admin.pengaturan.pembayaran.edit');
        Route::put('admin/pengaturan/metode-pembayaran/edit/{pembayaran}', [MetodePembayaranController::class, 'update'])->name('admin.pengaturan.pembayaran.update');
        Route::delete('admin/pengaturan/metode-pembayaran/edit/{pembayaran}', [MetodePembayaranController::class, 'destroy'])->name('admin.pengaturan.pembayaran.destroy');
        Route::get('admin/pengaturan/metode-pembayaran/show/{pembayaran}', [MetodePembayaranController::class, 'show'])->name('admin.pengaturan.pembayaran.show');


        //SOsmed User Routes
        Route::get('admin/pengaturan/user', UserIndexComponent::class)->name('admin.pengaturan.user');

        // Sosmed Toko Routes
        Route::get('admin/pengaturan/sosmed-toko', [SosmedController::class, 'index'])->name('admin.pengaturan.sosmed-toko');

        //Profil Toko Routes
        Route::get('admin/pengaturan/profil-toko', [ProfilTokoController::class, 'index'])->name('admin.pengaturan.profil-toko');
        Route::get('admin/pengaturan/profil-toko/{id}/edit', ProfilTokoUpdate::class)->name('admin.pengaturan.profil-toko.edit');

        //Profil User Routes
        Route::get('/admin/{id}/profile-user', EditProfileUser::class)->name('admin.profile-user');
        Route::get('/admin/{id}/profile-user/update', EditProfieUserUpdate::class)->name('admin.profile-user.update');
});

Auth::routes(['verify' => true]);

Route::get('/auth/google', [SocialiteController::class, 'redirect'])->name('auth.google');
Route::get('/auth/google/callback', [SocialiteController::class, 'callback']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
