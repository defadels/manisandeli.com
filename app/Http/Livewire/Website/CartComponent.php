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
            Cart::instance('cart')->store(Auth::user()->email);
            Cart::instance('cart')->restore(Auth::user()->email);
        }
        
        $this->setAmountForCheckout();
        return view('livewire.website.cart-component')->layout('layout.website_layout');
    }

    public function checkout() {
        if(Auth::check()) {
            return redirect()->route('website.checkout');
        } else {
            return redirect()->route('login');
        }
    }

    public function setAmountForCheckout(){
        if(!Cart::instance('cart')->count() > 0) {
            session()->forget('checkout');
            return; 
        } else {
                session()->put('checkout', [
                'subtotal' => Cart::instance('cart')->subtotal(),
                'discount' => 0,
                'tax' => Cart::instance('cart')->tax(),
                'total' => Cart::instance('cart')->total(),
            ]);
        }
        
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
