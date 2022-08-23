<?php

namespace App\Http\Livewire\Website;

use Livewire\Component;
use App\Models\Produk;
use Livewire\WithPagination;
use Cart;
use Auth;

class DetailProduk extends Component
{   

    public $produk_id;

    public function mount($id){
        $this->produk_id = $id;
    }

    public function store($produk_id, $nama_produk, $harga_jual){
        Cart::instance('cart')->add($produk_id,$nama_produk,1,$harga_jual)->associate('App\Models\Produk');
        session()->flash('message', 'Produk masuk ke keranjang');

        return redirect()->route('website.detail-produk');
    }

    use WithPagination;


    public function render()
    {
        $produk = Produk::find($this->produk_id);

        $daftar_produk = Produk::paginate(10);

        if(Auth::check()){
            Cart::instance('cart')->store(Auth::user()->email);
        }

        return view('livewire.website.detail-produk', compact('produk','daftar_produk'))->layout('layout.website_layout');
    }
}
