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

    public $paymentmethod, $label, $alamat, $alamatId;

    protected $listeners = [
        'getAlamat' => 'showData'
    ];

    public function getAlamat($id){
        $this->alamatId = $id;

        $alamat = AlamatPelanggan::find($id);

        $this->emit('getAlamat', $alamat);
    }

    public function showData($alamat){
        $this->label = $alamat['label'];
        $this->alamat = $alamat['alamat'];
    }

    // public function mount(){

    //     $alamat = AlamatPelanggan::find($alamatId);

    //     $this->label = $alamat->label;
    //     $this->alamat = $alamat->alamat;
    // }

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


}
