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
use Illuminate\Support\Facades\Storage;
use App\Models\MetodePembayaranPelanggan;

class CheckoutComponent extends Component
{

    public $paymentmethod, $label, $nama_lengkap, $email, $nomor_hp, $alamat_lengkap, $alamatId, $provinsi, $kota, $kode_pos, $alamat_id, $pelanggan_id;

    public $nama_bank, $nama_pemilik, $nomor_rekening, $jenis;

    public $bank_tujuan, $bank_tujuan_id, $pemilik_rekening_tujuan, $rekening_tujuan, $pembayaran_pelanggan_id, $foto_bukti_tf, $foto_url, $konfirmasi;

    use WithFileUploads;

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

        $bank_tujuan_kepada = MetodePembayaranToko::find($id);
        $this->emit('getBankTujuan', $bank_tujuan_kepada);
    }

    // function untuk tampilkan data bank toko berdasarkan id
    public function showBankTujuan($bank_tujuan_kepada){
        $this->bank_tujuan = $bank_tujuan_kepada['nama_bank'];
        $this->pemilik_rekening_tujuan = $bank_tujuan_kepada['nama_pemilik'];
        $this->rekening_tujuan = $bank_tujuan_kepada['nomor_rekening'];
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
        if($this->paymentmethod == 0) {
            $this->validateOnly($fields, [
            'nama_lengkap' => 'required',
            'email' => 'required|email',
            'nomor_hp' => 'required',
            'alamat_lengkap' => 'required',
            'provinsi' => 'required',
            'kota' => 'required',
            'kode_pos' => 'required',
        ]);
        }
        

        if($this->paymentmethod == 'transfer'){
            $this->validateOnly($fields, [
                'nama_lengkap' => 'required',
                'email' => 'required|email',
                'nomor_hp' => 'required',
                'alamat_lengkap' => 'required',
                'provinsi' => 'required',
                'kota' => 'required',
                'kode_pos' => 'required',
                'nama_bank' => 'required',
                'nama_pemilik' => 'required',
                'nomor_rekening' => 'required',
                'bank_tujuan' => 'required',
                'pemilik_rekening_tujuan' => 'required',
                'rekening_tujuan' => 'required',
                'foto_bukti_tf' => 'required|mimes:png,jpeg'
            ]);
        }
        
        if($this->paymentmethod == 'cod'){
            $this->validateOnly($fields, [
                'nama_lengkap' => 'required',
                'email' => 'required|email',
                'nomor_hp' => 'required',
                'alamat_lengkap' => 'required',
                'provinsi' => 'required',
                'kota' => 'required',
                'kode_pos' => 'required',
            ]);
        }
    }

    public function placeOrder(){


    if($this->paymentmethod == 0) {
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
        $order->subtotal = session()->get('checkout')['subtotal']; 
        $order->diskon = session()->get('checkout')['discount']; 
        $order->total = session()->get('checkout')['total']; 
        $order->ongkir = session()->get('checkout')['tax']; 
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
        $transaksi->status = 'Disetujui';
        $transaksi->save();
    }

        if($this->paymentmethod == 'transfer'){

            $this->validate([
                'nama_lengkap' => 'required',
                'email' => 'required|email',
                'nomor_hp' => 'required',
                'alamat_lengkap' => 'required',
                'provinsi' => 'required',
                'kota' => 'required',
                'kode_pos' => 'required',
                'nama_bank' => 'required',
                'nama_pemilik' => 'required',
                'nomor_rekening' => 'required',
                'bank_tujuan' => 'required',
                'pemilik_rekening_tujuan' => 'required',
                'rekening_tujuan' => 'required',
                'alamat_id' => 'nullable',
                'foto_bukti_tf' => 'required|mimes:png,jpeg',
            ]);

            $sekarang = Carbon::now();

            $invoice =  'INV/'.$sekarang->format('ymd').
                        '/'.$sekarang->format('his').
                        '/'.Str::upper(Str::random(6));
    
            $order = new Order();
            $order->pelanggan_id = Auth::user()->id;
            $order->subtotal = session()->get('checkout')['subtotal']; 
            $order->diskon = session()->get('checkout')['discount']; 
            $order->total = session()->get('checkout')['total']; 
            $order->ongkir = session()->get('checkout')['tax']; 
            $order->invoice = $invoice;
            $order->nama_lengkap = $this->nama_lengkap;
            $order->email =  $this->email;
            $order->nomor_hp = $this->nomor_hp;
            $order->metode_pembayaran = 'COD';
            $order->status = 'masuk';
            $order->pengiriman_berbeda = 1;
            $order->save();

            $transaksi = new Transaksi();
            $transaksi->orderan_id = $order->id;
            $transaksi->invoice = $invoice;
            $transaksi->pelanggan_id = Auth::user()->id;
            // $transaksi->pembayaran_pelanggan_id = $this->bankPelangganId;
            $transaksi->nama_bank = $this->nama_bank;
            $transaksi->nama_pemilik = $this->nama_pemilik;
            $transaksi->nomor_rekening = $this->nomor_rekening;
            $transaksi->bank_tujuan = $this->bank_tujuan;
            $transaksi->pemilik_rekening_tujuan = $this->pemilik_rekening_tujuan;
            $transaksi->rekening_tujuan = $this->rekening_tujuan;
            $transaksi->metode_pembayaran = 'Bayar di Toko';
            $transaksi->status = 'Ditunda';

            if($this->$foto_bukti_tf){
                $nama_file = Str::uuid();
                $path = 'transfer/';
                $file_extension = $this->foto_bukti_tf->extension();
                $transaksi->foto_bukti_tf = $path.$nama_file.".".$file_extension;

                $bukti_tf = $this->foto_bukti_tf;

                Storage::putFileAs('/app/public/',$bukti_tf);

            }

            $transaksi->save();

            $pengiriman = new Pengiriman();
            $pengiriman->alamat_id = $this->alamatId;
            $pengiriman->orderan_id = $order->id;
            $pengiriman->alamat_lengkap = $this->alamat_lengkap;
            $pengiriman->provinsi = $this->provinsi;
            $pengiriman->kota = $this->kota;
            $pengiriman->kode_pos = $this->kode_pos;
            $pengiriman->save();


        } 
        
        if($this->paymentmethod == 'cod'){

            $this->validate([
                'nama_lengkap' => 'required',
                'email' => 'required|email',
                'nomor_hp' => 'required',
                'alamat_lengkap' => 'required',
                'provinsi' => 'required',
                'kota' => 'required',
                'kode_pos' => 'required',
                'pembayaran_pelanggan_id' => 'nullable',
                'alamat_id' => 'nullable'
            ]);


            $sekarang = Carbon::now();

            $invoice =  'INV/'.$sekarang->format('ymd').
                        '/'.$sekarang->format('his').
                        '/'.Str::upper(Str::random(6));
    
            $order = new Order();
            $order->pelanggan_id = Auth::user()->id;
            $order->subtotal = session()->get('checkout')['subtotal']; 
            $order->diskon = session()->get('checkout')['discount']; 
            $order->total = session()->get('checkout')['total']; 
            $order->ongkir = session()->get('checkout')['tax']; 
            $order->invoice = $invoice;
            $order->nama_lengkap = $this->nama_lengkap;
            $order->email =  $this->email;
            $order->nomor_hp = $this->nomor_hp;
            $order->status = 'masuk';
            $order->pengiriman_berbeda = 1;
            $order->save();

            $transaksi = new Transaksi();
            $transaksi->orderan_id = $order->id;
            $transaksi->invoice = $invoice;
            $transaksi->pelanggan_id = Auth::user()->id;
            $transaksi->nama_bank = $this->nama_bank;
            $transaksi->nama_pemilik = $this->nama_pemilik;
            $transaksi->nomor_rekening = $this->nomor_rekening;
            $transaksi->bank_tujuan = $this->bank_tujuan;
            $transaksi->pemilik_rekening_tujuan = $this->pemilik_rekening_tujuan;
            $transaksi->rekening_tujuan = $this->rekening_tujuan;
            $transaksi->metode_pembayaran = 'COD';
            $transaksi->status = 'Ditunda';
            $transaksi->save();

            $pengiriman = new Pengiriman();
            $pengiriman->alamat_id = $this->alamatId;
            $pengiriman->orderan_id = $order->id;
            $pengiriman->alamat_lengkap = $this->alamat_lengkap;
            $pengiriman->provinsi = $this->provinsi;
            $pengiriman->kota = $this->kota;
            $pengiriman->kode_pos = $this->kode_pos;
            $pengiriman->save();

            
        } 

        foreach(Cart::instance('cart')->content() as $item){
            $orderItem = new OrderItem();
            $orderItem->produk_id = $item->id;
            $orderItem->orderan_id =  $order->id;
            $orderItem->harga = $item->price; 
            $orderItem->jumlah = $item->qty;
            $orderItem->save();
        }

        $this->konfirmasi = 1;

        Cart::instance('cart')->destroy();
        session()->forget('checkout');

        session()->put('order', [
            'invoice' => $order['invoice'],
        ]);

        return redirect()->route('website.konfirmasi');

    }

    public function verifyForCheckout(){
        if($this->konfirmasi) {
            
            return redirect()->route('website.konfirmasi');
        } else if(!session()->get('checkout')){
            return redirect()->route('website.produk');
        }
    }

    public function render()
    {
        Cart::instance('cart')->restore(Auth::user()->email);

        // $this->verifyForCheckout();

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
