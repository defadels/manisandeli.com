<?php

use Illuminate\Support\Facades\Route;

// Controller

    // Admin Controller
    use App\Http\Controllers\Admin\AdminController;
    use App\Http\Controllers\Admin\ProdukController;
    use App\Http\Controllers\Admin\Pengaturan\MetodePembayaranController;
    use App\Http\Controllers\Admin\Pengaturan\SosmedController;
    use App\Http\Controllers\Admin\Pengaturan\ProfilTokoController;
    use App\Http\Controllers\Admin\Pengaturan\TextareaController;

    // Owner Controller
    use App\Http\Controllers\Owner\OwnerController;

    // Frontend Controller
    use App\Http\Controllers\Website\HomeController;
    use App\Http\Controllers\SocialiteController;

    // Customization Auth
    use App\Http\Controllers\Auth\AdminLoginController;


// Laravel Livewire Module

    // Website Livewire
    use App\Http\Livewire\Website\ProfileUser;
    use App\Http\Livewire\Website\ProdukComponent;
    use App\Http\Livewire\Website\DetailProduk;
    use App\Http\Livewire\Website\TentangKami;
    use App\Http\Livewire\Website\HomeComponent;
    use App\Http\Livewire\Website\CheckoutComponent;
    use App\Http\Livewire\Website\CheckoutCODComponent;
    use App\Http\Livewire\Website\CheckoutTransferComponent;
    use App\Http\Livewire\Website\CheckoutTransferAlamat;
    use App\Http\Livewire\Website\CheckoutTransferToko;
    use App\Http\Livewire\Website\KonfirmasiComponent;
    use App\Http\Livewire\Website\KebijakanPrivasi;
    use App\Http\Livewire\Website\ComingSoonComponent;
    use App\Http\Livewire\Website\OrderankuComponent;


    // Admin Livewire
    use App\Http\Livewire\Admin\SosmedToko;
    use App\Http\Livewire\Admin\LaporanComponent;
    use App\Http\Livewire\Admin\ProfilTokoUpdate;
    use App\Http\Livewire\Admin\EditProfileUser;
    use App\Http\Livewire\Admin\EditProfieUserUpdate;
    use App\Http\Livewire\Admin\UserIndexComponent;
    use App\Http\Livewire\Admin\PelangganComponent;
    use App\Http\Livewire\Admin\SliderComponent;
    use App\Http\Livewire\Admin\TextareaComponent;
    use App\Http\Livewire\Admin\TextareaCreateComponent;
    use App\Http\Livewire\Admin\TestimoniComponent;
    use App\Http\Livewire\Admin\Penjualan\OrderanMasuk;
    use App\Http\Livewire\Admin\Penjualan\OrderanMasukDetail;
    use App\Http\Livewire\Admin\Penjualan\OrderanProses;
    use App\Http\Livewire\Admin\Penjualan\OrderanProsesDetail;
    use App\Http\Livewire\Admin\Penjualan\OrderanDikirim;
    use App\Http\Livewire\Admin\Penjualan\OrderanDikirimDetail;
    use App\Http\Livewire\Admin\Penjualan\OrderanSelesai;
    use App\Http\Livewire\Admin\Penjualan\OrderanSelesaiDetail;
    use App\Http\Livewire\Admin\Penjualan\OrderanBatal;
    use App\Http\Livewire\Admin\Penjualan\OrderanBatalDetail;
    use App\Http\Livewire\Admin\Penjualan\OrderanPrint;
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

    Route::get('/', HomeComponent::class)->name('website.home');
    Route::get('/{id}/profile-user', ProfileUser::class)->name('website.profile.user');
    
    Route::get('/tentang-kami', TentangKami::class)->name('website.tentang');
    
    Route::get('/produk', ProdukComponent::class)->name('website.produk');
    Route::get('/produk/{id}/detail-produk', DetailProduk::class)->name('website.detail.produk');

    Route::get('/kebijakan-privasi', KebijakanPrivasi::class)->name('website.kebijakan-privasi');

    Route::get('/coming-soon', ComingSoonComponent::class)->name('website.coming-soon');
    Route::get('/orderanku', OrderankuComponent::class)->name('website.orderanku');

Route::middleware('auth')->group(function(){

    Route::get('/checkout', CheckoutComponent::class)->name('website.checkout');
    Route::get('/checkout/transfer', CheckoutTransferComponent::class)->name('website.checkout.transfer');
    Route::get('/checkout/transfer/alamat-pribadi', CheckoutTransferAlamat::class)->name('website.checkout.transfer.alamat');
    Route::get('/checkout/transfer/ambil-ditoko', CheckoutTransferToko::class)->name('website.checkout.transfer.ditoko');
    Route::get('/checkout/cash-on-delivery', CheckoutCODComponent::class)->name('website.checkout.cod');
    Route::get('/terima-kasih', KonfirmasiComponent::class)->name('website.konfirmasi');

});


Route::prefix('owner')->name('owner.')->middleware('auth', 'reject_except_owner')->namespace('Owner')->group(function(){
    Route::get('/', [OwnerController::class, 'index'])->name('dashboard');
});


Route::get('/admin', [AdminLoginController::class, 'showLoginForm']);

Route::middleware('auth', 'reject_except_admin')->group(function(){
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    Route::get('/admin/laporan', LaporanComponent::class)->name('admin.laporan');
    
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

        // Slider Routes
        Route::get('admin/pengaturan/slider', SliderComponent::class)->name('admin.pengaturan.slider');

        // Testimoni Routes
        Route::get('admin/pengaturan/testimoni', TestimoniComponent::class)->name('admin.pengaturan.testimoni');

        // Textarea Roites
        Route::get('admin/pengaturan/textarea', [TextareaController::class, 'index'])->name('admin.pengaturan.textarea');
        Route::get('admin/pengaturan/textarea/tambah', [TextareaController::class, 'create'])->name('admin.pengaturan.textarea.create');
        Route::post('admin/pengaturan/textarea', [TextareaController::class, 'store'])->name('admin.pengaturan.textarea.store');
        Route::get('admin/pengaturan/textarea/edit/{textarea}', [TextareaController::class, 'edit'])->name('admin.pengaturan.textarea.edit');
        Route::put('admin/pengaturan/textarea/edit/{textarea}', [TextareaController::class, 'update'])->name('admin.pengaturan.textarea.update');
        Route::delete('admin/pengaturan/textarea/edit/{textarea}', [TextareaController::class, 'destroy'])->name('admin.pengaturan.textarea.destroy');

        //Sosmed User Routes
        Route::get('admin/pengaturan/user', UserIndexComponent::class)->name('admin.pengaturan.user');

        // Sosmed Toko Routes
        Route::get('admin/pengaturan/sosmed-toko', [SosmedController::class, 'index'])->name('admin.pengaturan.sosmed-toko');

        //Profil Toko Routes
        Route::get('admin/pengaturan/profil-toko', [ProfilTokoController::class, 'index'])->name('admin.pengaturan.profil-toko');
        Route::get('admin/pengaturan/profil-toko/{id}/edit', ProfilTokoUpdate::class)->name('admin.pengaturan.profil-toko.edit');

        Route::get('admin/penjualan/masuk', OrderanMasuk::class)->name('admin.orderan.masuk');
        Route::get('admin/penjualan/masuk/{orderan_id}/detail', OrderanMasukDetail::class)->name('admin.orderan.masuk.detail');
        Route::get('admin/penjualan/proses', OrderanProses::class)->name('admin.orderan.proses');
        Route::get('admin/penjualan/proses/{orderan_id}/detail', OrderanProsesDetail::class)->name('admin.orderan.proses.detail');
        Route::get('admin/penjualan/dikirim', OrderanDikirim::class)->name('admin.orderan.dikirim');
        Route::get('admin/penjualan/dikirim/{orderan_id}/detail', OrderanDikirimDetail::class)->name('admin.orderan.dikirim.detail');
        Route::get('admin/penjualan/selesai', OrderanSelesai::class)->name('admin.orderan.selesai');
        Route::get('admin/penjualan/selesai/{orderan_id}/detail', OrderanSelesaiDetail::class)->name('admin.orderan.selesai.detail');
        Route::get('admin/penjualan/batal', OrderanBatal::class)->name('admin.orderan.batal');
        Route::get('admin/penjualan/batal/{orderan_id}/detail', OrderanBatalDetail::class)->name('admin.orderan.batal.detail');
        Route::get('admin/penjualan/{orderan_id}/print', [AdminController::class, 'print'])->name('admin.orderan.print');


        //Profil User Routes
        Route::get('/admin/{id}/profile-user', EditProfileUser::class)->name('admin.profile-user');
        Route::get('/admin/{id}/profile-user/update', EditProfieUserUpdate::class)->name('admin.profile-user.update');
});

Auth::routes(['verify' => true]);

Route::get('/auth/{provider}', [SocialiteController::class, 'redirect']);
Route::get('/auth/{provider}/callback', [SocialiteController::class, 'callback']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
