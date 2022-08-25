<?php

namespace App\Http\Livewire\Website;

use Str;
use Auth;
use Cart;
use App\Models\Order;
use Livewire\Component;
use App\Models\OrderItem;
use App\Models\Transaksi;
use App\Models\Pengiriman;
use App\Http\Models\Produk;
use Carbon\Carbon;
use App\Models\AlamatPelanggan;
use App\Models\MetodePembayaranToko;
use App\Models\MetodePembayaranPelanggan;

class CheckoutComponent extends Component
{

    public $paymentmethod, $label, $nama_lengkap, $email, $nomor_hp, $alamat_lengkap, $alamatId, $provinsi, $kota, $kode_pos, $alamat_id, $pelanggan_id;

    public $nama_bank, $nama_pemilik, $nomor_rekening, $jenis;

    public $tujuan_bank, $pemilik_rekening_tujuan, $rekening_tujuan;

    // listener untuk mengambil data
    protected $listeners = [
        'getAlamat' => 'showData',
        'getBankPelanggan' => 'showBankPelanggan',
        'getBankTujuan' => 'showBankTujuan'
    ];


    // function untuk ambil data bank pelanggan berdasarkan id
    public function getBankPelanggan($id) {
        $this->bankPelangganId = $id;

        $bank_pelanggan = MetodePembayaranPelanggan::find($id);
        $this->emit('getBankPelanggan', $bank_pelanggan);
    }

    // function untuk tampilkan data bank pelanggan berdasarkan id
    public function showBankPelanggan($bank_pelanggan) {
        $this->nama_bank = $bank_pelanggan['nama_bank'];
        $this->nama_pemilik = $bank_pelanggan['nama_pemilik'];
        $this->nomor_rekening = $bank_pelanggan['nomor_rekening'];
        $this->deskripsi = $bank_pelanggan['deskripsi'];
        $this->jenis = $bank_pelanggan['jenis'];
    }

    // function untuk ambil data bank toko berdasarkan id
    public function getBankTujuan($id){
        $this->bank_tujuan_id = $id;

        $bank_tujuan = MetodePembayaranToko::find($id);
        $this->emit('getBankTujuan', $bank_tujuan);
    }

    // function untuk tampilkan data bank toko berdasarkan id
    public function showBankTujuan($bank_tujuan){
        $this->tujuan_bank = $bank_tujuan['nama_bank'];
        $this->pemilik_rekening_tujuan = $bank_tujuan['nama_pemilik'];
        $this->rekening_tujuan = $bank_tujuan['nomor_rekening'];
    }

    // function untuk ambil data alamat pelanggan berdasarkan id
    public function getAlamat($id){
        $this->alamatId = $id;

        $alamat_detail = AlamatPelanggan::find($id);


        $this->emit('getAlamat', $alamat_detail);
    }

    // function untuk tampilkan data alamat pelanggan berdasarkan id
   public function showData($alamat_detail){
        $this->label = $alamat_detail['label'];
        $this->alamat_lengkap = $alamat_detail['alamat_lengkap'];
        $this->kode_pos = $alamat_detail['kode_pos'];
        $this->provinsi = $alamat_detail['provinsi'];
        $this->kota = $alamat_detail['kota'];
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
            'email' => 'required}email',
            'nomor_hp' => 'required',
            'alamat_lengkap' => 'required',
            'provinsi' => 'required',
            'kota' => 'required',
            'kode_pos' => 'required',
        ]);
    }

    public function placeOrder(){
        $this->validate([
            'nama_lengkap' => 'required',
            'email' => 'required}email',
            'nomor_hp' => 'required',
            'alamat_lengkap' => 'required',
            'provinsi' => 'required',
            'kota' => 'required',
            'kode_pos' => 'required',
        ]);

       
        if($paymentmethod == 'transfer'){
            $sekarang = Carbon::now();

            $invoice =  'INV/'.$sekarang->format('ymd').
                        '/'.$sekarang->format('his').
                        '/'.Str::upper(Str::random(6));
    
            $order = new Order();
            $order->pelanggan_id = Auth::user()->id;
            $order->alamat_id = $this->alamatId;
            $order->subtotal = session()->get('checkout')['subtotal']; 
            $order->diskon = session()->get('checkout')['discount']; 
            $order->total = session()->get('checkout')['total']; 
            $order->ongkir = session()->get('checkout')['tax']; 
            $order->invoice = $invoice;
            $order->nama_lengkap = $this->nama_lengkap;
            $order->email =  $this->email;
            $order->nomor_hp = $this->nomor_hp;
            $order->alamat_lengkap = $this->alamat_lengkap;
            $order->provinsi = $this->provinsi;
            $order->kota = $this->kota;
            $order->kode_pos = $this->kode_pos;
            $order->status = 'masuk';
            $order->save();

            $transaksi = new Transaksi();
            $transaksi->nama_bank = $this->nama_bank;
            $transaksi->nama_pemilik = $this->nama_pemilik;
            $transaksi->nomor_rekening = $this->nomor_rekening;
            $transaksi->deskripsi = $this->deskripsi;
            $transaksi->jenis = $this->jenis;
            $transaksi->tujuan_bank = $this->tujuan_bank;
            $transaksi->pemilik_rekening_tujuan = $this->pemilik_rekening_tujuan;
            $transaksi->rekening_tujuan = $this->rekening_tujuan;
            $transaksi->save();
        }else if($paymentmethod == 'cod'){
            $sekarang = Carbon::now();

            $invoice =  'INV/'.$sekarang->format('ymd').
                        '/'.$sekarang->format('his').
                        '/'.Str::upper(Str::random(6));
    
            $order = new Order();
            $order->pelanggan_id = Auth::user()->id;
            $order->alamat_id = $this->alamatId;
            $order->subtotal = session()->get('checkout')['subtotal']; 
            $order->diskon = session()->get('checkout')['discount']; 
            $order->total = session()->get('checkout')['total']; 
            $order->ongkir = session()->get('checkout')['tax']; 
            $order->invoice = $invoice;
            $order->nama_lengkap = $this->nama_lengkap;
            $order->email =  $this->email;
            $order->nomor_hp = $this->nomor_hp;
            $order->alamat_lengkap = $this->alamat_lengkap;
            $order->provinsi = $this->provinsi;
            $order->kota = $this->kota;
            $order->kode_pos = $this->kode_pos;
            $order->status = 'masuk';
            $order->save();
        } else {
            $sekarang = Carbon::now();

            $invoice =  'INV/'.$sekarang->format('ymd').
                        '/'.$sekarang->format('his').
                        '/'.Str::upper(Str::random(6));
    
            $order = new Order();
            $order->pelanggan_id = Auth::user()->id;
            $order->alamat_id = $this->alamatId;
            $order->subtotal = session()->get('checkout')['subtotal']; 
            $order->diskon = session()->get('checkout')['discount']; 
            $order->total = session()->get('checkout')['total']; 
            $order->ongkir = session()->get('checkout')['tax']; 
            $order->invoice = $invoice;
            $order->nama_lengkap = $this->nama_lengkap;
            $order->email =  $this->email;
            $order->nomor_hp = $this->nomor_hp;
            $order->alamat_lengkap = $this->alamat_lengkap;
            $order->provinsi = $this->provinsi;
            $order->kota = $this->kota;
            $order->kode_pos = $this->kode_pos;
            $order->status = 'masuk';
            $order->save();
        }



        foreach(Cart::instance('cart')->content() as $item){
            $orderItem = new OrderItem();
            $orderItem->produk_id = $item->id;
            $orderItem->order_id =  $order->id;
            $orderItem->harga = $item->harga; 
            $orderItem->jumlah = $item->qty;
            $orderItem->save();
        }

    }

    public function render()
    {
        Cart::instance('cart')->restore(Auth::user()->email);

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
