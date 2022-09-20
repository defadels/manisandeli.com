<?php

namespace App\Http\Livewire\Website;

use Str;
use Auth;
use Cart;
use Carbon\Carbon;
use App\Models\Order;
use Livewire\Component;
use App\Models\OrderItem;
use App\Models\Transaksi;
use App\Models\Pengiriman;
use App\Http\Models\Produk;
use Livewire\WithFileUploads;
use App\Models\AlamatPelanggan;
use App\Models\MetodePembayaranToko;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Models\MetodePembayaranPelanggan;

class CheckoutComponent extends Component
{

    public $paymentmethod, $shipping, $pelanggan_id;
    
    public $label, $nama_lengkap, $email, $nomor_hp, $alamat_lengkap, $alamatId, $provinsi, $kota, $kode_pos, $alamat_id;

    public $nama_bank, $nama_pemilik, $nomor_rekening, $jenis;

    public $bank_tujuan, $bank_tujuan_id, $pemilik_rekening_tujuan, $rekening_tujuan, $pembayaran_pelanggan_id, $foto_bukti_tf, $foto_url, $konfirmasi;

    use WithFileUploads;

    public function paymentmethod($pembayaran){
        $this->paymentmethod = $pembayaran;
        $this->shipping = null;
    }
   
    public function mount(){
        $this->nama_lengkap = Auth::user()->nama;
        $this->email = Auth::user()->email;
        $this->nomor_hp = Auth::user()->nomor_hp; 
        $this->pelanggan_id = Auth::user()->id;
    }

    public function updated($fields){
            $this->validateOnly($fields, [
            'nama_lengkap' => 'required',
            'email' => 'required|email',
            'nomor_hp' => 'required',
            'alamat_lengkap' => 'required',
        ]);

    }

    public function placeOrder(){


        $this->validate([
            'nama_lengkap' => 'required',
            'email' => 'required|email',
            'nomor_hp' => 'required',
            'pembayaran_pelanggan_id' => 'nullable'
        ]);

        $sekarang = Carbon::now();

        $invoice =  'INV/'.$sekarang->format('ymd').
                    '/'.$sekarang->format('his').
                    '/'.Str::upper(Str::random(6));

        $order = new Order();
        $order->pelanggan_id = Auth::user()->id;
        $order->subtotal = Cart::instance('cart')->subtotal; 
        $order->diskon = 0.00; 
        $order->total = Cart::instance('cart')->subtotal; 
        $order->ongkir = 0.00; 
        $order->invoice = $invoice;
        $order->nama_lengkap = $this->nama_lengkap;
        $order->email =  $this->email;
        $order->nomor_hp = $this->nomor_hp;
        $order->status = 'masuk';
        $order->save();

        $transaksi = new Transaksi();
        $transaksi->orderan_id = $order->id;
        $transaksi->invoice = $invoice;
        $transaksi->pelanggan_id = Auth::user()->id;
        $transaksi->metode_pembayaran = 'Bayar di Toko';
        $transaksi->status = 'Ditunda';
        $transaksi->save();
 

        foreach(Cart::instance('cart')->content() as $item){
            $orderItem = new OrderItem();
            $orderItem->produk_id = $item->id;
            $orderItem->orderan_id =  $order->id;
            $orderItem->harga = $item->price; 
            $orderItem->jumlah = $item->qty;
            $orderItem->save();
        }

        $this->konfirmasi = 1;
        
        session()->forget('checkout');

    }

    public function verifyForCheckout(){
        if($this->konfirmasi) {
            Cart::destroy();
            return redirect()->route('website.konfirmasi');
        } else if(!session()->get('checkout')){
            return redirect()->route('website.produk');
        }
    }

    public function render()
    {
        Cart::instance('cart')->restore(Auth::user()->email);

        $this->verifyForCheckout();

        $daftar_alamat = AlamatPelanggan::where('pelanggan_id', Auth::user()->id)->get();

        $daftar_bank_pelanggan = MetodePembayaranPelanggan::where('pelanggan_id', Auth::user()->id)->get();

        $daftar_bank_toko = MetodePembayaranToko::get();

        return view('livewire.website.checkout-component', compact('daftar_alamat','daftar_bank_pelanggan','daftar_bank_toko'))->layout('layout.website_layout');
    }


    // function untuk hapus item di keranjang
    public function hapusItem($rowId){

        Cart::instance('cart')->remove($rowId);
    }

     // function untuk reset form alamat jika ingin isi custom
     public function customAlamat(){
        $this->label = 'Custom';
        $this->alamat_lengkap = null;
        $this->kode_pos = null;
        $this->provinsi = null;
        $this->kota = null;
    }

    // function untuk reset form pembayaran jika ingin isi custom
    public function customBankPelanggan(){
        $this->nama_bank = 'Custom';
        $this->nama_pemilik = null;
        $this->nomor_rekening = null;
        $this->deskripsi = null;
        $this->jenis = null;
    }

}
