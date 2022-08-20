<?php

namespace App\Http\Livewire\Website;

use Livewire\Component;
use App\Models\Produk;
use Livewire\WithPagination;
use Cart;
use Auth;

class ProdukComponent extends Component
{
    public function store($produk_id, $nama_produk, $harga_jual){
        Cart::add($produk_id,$nama_produk,1,$harga_jual)->associate('App\Models\Produk');
        session()->flash('message', 'Produk masuk ke keranjang');

        return redirect()->route('website.produk');
    }
    
    use WithPagination;
    public function render()
    {   

        $daftar_produk = Produk::paginate(12);

        if(Auth::check())
        {
            Cart::instance('cart')->store(Auth::user()->email);
        }

        return view('livewire.website.produk-component',compact('daftar_produk'))->layout('layout.website_layout');
    }
}
