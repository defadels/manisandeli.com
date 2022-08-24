<?php

namespace App\Http\Livewire\Website;

use Livewire\Component;
use App\Http\Models\Produk;
use App\Models\AlamatPelanggan;
use App\Models\MetodePembayaranPelanggan;
use Cart;
use Auth;

class CheckoutComponent extends Component
{

    public $paymentmethod, $label, $nama_lengkap, $email, $nomor_hp, $alamat_lengkap, $alamatId, $provinsi, $kota, $kode_pos, $alamat_id, $pelanggan_id;

    

    protected $listeners = [
        'getAlamat' => 'showData'
    ];

    public function getAlamat($id){
        $this->alamatId = $id;

        $alamat_detail = AlamatPelanggan::find($id);


        $this->emit('getAlamat', $alamat_detail);
    }

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
        
    }

    public function render()
    {
        Cart::instance('cart')->restore(Auth::user()->email);

        $daftar_alamat = AlamatPelanggan::where('pelanggan_id', Auth::user()->id)->get();

        $daftar_pembayaran = MetodePembayaranPelanggan::where('pelanggan_id', Auth::user()->id)->get();

        return view('livewire.website.checkout-component', compact('daftar_alamat','daftar_pembayaran'))->layout('layout.website_layout');
    }

    public function hapusItem($rowId){

        Cart::instance('cart')->remove($rowId);
    }


    public function customAlamat(){
        $this->label = 'Custom';
        $this->alamat_lengkap = null;
        $this->kode_pos = null;
        $this->provinsi = null;
        $this->kota = null;
    }

}
