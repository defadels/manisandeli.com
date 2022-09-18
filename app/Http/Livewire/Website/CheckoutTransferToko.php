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

class CheckoutTransferToko extends Component
{
    public $pengiriman = null;

    public $paymentmethod, $shipping;
    
    public $label, $nama_lengkap, $email, $nomor_hp, $alamat_lengkap, $alamatId, $provinsi, $kota, $kode_pos, $alamat_id, $pelanggan_id;

    public $nama_bank, $nama_pemilik, $nomor_rekening, $jenis;

    public $bank_tujuan, $bank_tujuan_id, $pemilik_rekening_tujuan, $rekening_tujuan, $pembayaran_pelanggan_id, $foto_bukti_tf, $foto_url, $konfirmasi;

    use WithFileUploads;

     // listener untuk mengambil data
     protected $listeners = [
        'getAlamat' => 'showData',
        'getBankPelanggan' => 'showBankPelanggan',
        'getBankTujuan' => 'showBankTujuan'
    ];

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

    // function untuk ambil data bank pelanggan berdasarkan id
    public function getBankPelanggan($id) {
        $this->pembayaran_pelanggan_id = $id;

        $bank_pelanggan = MetodePembayaranPelanggan::find($id);
        $this->emit('getBankPelanggan', $bank_pelanggan);
    }

    // function untuk tampilkan data bank pelanggan berdasarkan id
    public function showBankPelanggan($bank_pelanggan) {
        $this->nama_bank = $bank_pelanggan['nama_bank'];
        $this->nama_pemilik = $bank_pelanggan['nama_pemilik'];
        $this->nomor_rekening = $bank_pelanggan['nomor_rekening'];
        $this->deskripsi = $bank_pelanggan['deskripsi'];
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

    public function mount(){
        $this->nama_lengkap = Auth::user()->nama;
        $this->email = Auth::user()->email;
        $this->nomor_hp = Auth::user()->nomor_hp; 
        $this->pelanggan_id = Auth::user()->id;
        // $this->shipping = $pengiriman;
    }

    public function updated($fields){

                $this->validateOnly($fields, [
                    'nama_lengkap' => 'required',
                    'email' => 'required|email',
                    'nomor_hp' => 'required',
                    'nama_bank' => 'required',
                    'nama_pemilik' => 'required',
                    'nomor_rekening' => 'required',
                    'bank_tujuan' => 'required',
                    'pemilik_rekening_tujuan' => 'required',
                    'rekening_tujuan' => 'required',
                    'bank_tujuan_id' => 'required',
                    'pembayaran_pelanggan_id' => 'nullable',
                    'foto_bukti_tf' => 'mimes:jpeg,jpg,png|max:10240|required'
                ],
                [
                    'nama_lengkap.required' => 'Nama lengkap wajib diisi',
                    'email.required' => 'Email wajib diisi',
                    'nomor_hp.required' => 'Nomor handphone wajib diisi',
                    'nama_bank.required' => 'Bank wajib diisi',
                    'nama_pemilik.required' => 'Nama pemilik bank wajib diisi',
                    'nomor_rekening.required' => 'Nomor rekening wajib diisi',
                    'bank_tujuan.required' => 'Bank tujuan wajib diisi',
                    'pemilik_rekening_tujuan.required' => 'Pemilik rekening tujuan wajib diisi',
                    'bank_tujuan_id.required' => 'Rekening tujuan wajib diisi',
                    'rekening_tujuan.required' => 'Rekening tujuan wajib diisi',
                    'foto_bukti_tf.required' => 'Foto bukti transfer wajib diunggah'
                ]);

    }

    public function placeOrder(){

                $this->validate([
                    'nama_lengkap' => 'required',
                    'email' => 'required|email',
                    'nomor_hp' => 'required',
                    'nama_bank' => 'required',
                    'nama_pemilik' => 'required',
                    'nomor_rekening' => 'required',
                    'bank_tujuan' => 'required',
                    'pemilik_rekening_tujuan' => 'required',
                    'bank_tujuan_id' => 'required',
                    'rekening_tujuan' => 'required',
                    'pembayaran_pelanggan_id' => 'nullable',
                    'foto_bukti_tf' => 'mimes:jpeg,jpg,png|max:10240|required'
                    
                ],
                [
                    'nama_lengkap.required' => 'Nama lengkap wajib diisi',
                    'email.required' => 'Email wajib diisi',
                    'nomor_hp.required' => 'Nomor handphone wajib diisi',
                    'nama_bank.required' => 'Bank wajib diisi',
                    'nama_pemilik.required' => 'Nama pemilik bank wajib diisi',
                    'nomor_rekening.required' => 'Nomor rekening wajib diisi',
                    'bank_tujuan.required' => 'Bank tujuan wajib diisi',
                    'pemilik_rekening_tujuan.required' => 'Pemilik rekening tujuan wajib diisi',
                    'bank_tujuan_id.required' => 'Rekening tujuan wajib diisi',
                    'rekening_tujuan.required' => 'Rekening tujuan wajib diisi',
                    'foto_bukti_tf.required' => 'Foto bukti transfer wajib diunggah'
                ]);
                

                $sekarang = Carbon::now();

                $invoice =  'INV/'.$sekarang->format('ymd').
                            '/'.$sekarang->format('his').
                            '/'.Str::upper(Str::random(6));
        
                $order = new Order();
                $order->pelanggan_id = Auth::user()->id;
                $order->subtotal = Cart::instance('cart')->subtotal; 
                $order->diskon = 0; 
                $order->total = Cart::instance('cart')->subtotal; 
                $order->ongkir = 0; 
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
                $transaksi->nama_bank = $this->nama_bank;
                $transaksi->nama_pemilik = $this->nama_pemilik;
                $transaksi->nomor_rekening = $this->nomor_rekening;
                $transaksi->bank_tujuan = $this->bank_tujuan;
                $transaksi->pemilik_rekening_tujuan = $this->pemilik_rekening_tujuan;
                $transaksi->rekening_tujuan = $this->rekening_tujuan;
                $transaksi->metode_pembayaran = 'Transfer';
                $transaksi->status = 'Ditunda';

                if($this->foto_bukti_tf){
                    
                    $nama_file = Str::uuid();

                    $path = 'transfer/';
                    $file_extension = $this->foto_bukti_tf->extension();
                    $transaksi->foto_bukti_tf = $path.$nama_file.".".$file_extension;

                    $bukti_tf = $this->foto_bukti_tf;

                    Storage::putFileAs('public/',$this->foto_bukti_tf,$transaksi->foto_bukti_tf );

                }

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

        Session::forget('checkout');
        
        Session::put('order', [
            'invoice' => $order['invoice'],
        ]);

        Cart::instance('cart')->destroy();
        
        return redirect()->route('website.konfirmasi');

    }

    public function render()
    {
        Cart::instance('cart')->restore(Auth::user()->email);
        
        $daftar_alamat = AlamatPelanggan::where('pelanggan_id', Auth::user()->id)->get();

        $daftar_bank_pelanggan = MetodePembayaranPelanggan::where('pelanggan_id', Auth::user()->id)->get();

        $daftar_bank_toko = MetodePembayaranToko::get();

        return view('livewire.website.checkout-transfer-toko',compact('daftar_alamat','daftar_bank_pelanggan','daftar_bank_toko'))->layout('layout.website_layout');
    }

    // function untuk reset form pembayaran jika ingin isi custom
    public function customBankPelanggan(){
        $this->nama_bank = 'Custom';
        $this->nama_pemilik = null;
        $this->nomor_rekening = null;
        $this->deskripsi = null;
        $this->jenis = null;
    }

    // function untuk reset form alamat jika ingin isi custom
    public function customAlamat(){
        $this->label = 'Custom';
        $this->alamat_lengkap = null;
        $this->kode_pos = null;
        $this->provinsi = null;
        $this->kota = null;
    }
}
