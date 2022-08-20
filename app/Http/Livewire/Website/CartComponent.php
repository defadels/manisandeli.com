<?php

namespace App\Http\Livewire\Website;

use Livewire\Component;
use Cart;

class CartComponent extends Component
{
    public function tambahJumlah($rowId){
        $product = Cart::get($rowId);

        $qty = $product->qty + 1;

        Cart::update($rowId, $qty);
    }

    public function render()
    {
        return view('livewire.website.cart-component');
    }

    public function kurangJumlah($rowId){
        $product = Cart::get($rowId);

        $qty = $product->qty - 1;

        Cart::update($rowId, $qty);
    }
}
