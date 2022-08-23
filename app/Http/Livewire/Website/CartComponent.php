<?php

namespace App\Http\Livewire\Website;

use Livewire\Component;
use App\Http\Models\Produk;
use Cart;
use Auth;

class CartComponent extends Component
{
    public function tambahJumlah($rowId){
        $product = Cart::instance('cart')->get($rowId);

        $qty = $product->qty + 1;

        Cart::instance('cart')->update($rowId, $qty);
    }

    public function render()
    {   
        if(Auth::check())
        {
            // Cart::instance('cart')->restore(Auth::user()->email);
            Cart::instance('cart')->store(Auth::user()->email);
        }
        

        return view('livewire.website.cart-component');
    }

    public function kurangJumlah($rowId){
        $product = Cart::instance('cart')->get($rowId);

        $qty = $product->qty - 1;

        Cart::instance('cart')->update($rowId, $qty);
    }

    public function hapusItem($rowId){

        Cart::instance('cart')->remove($rowId);
    }
}
