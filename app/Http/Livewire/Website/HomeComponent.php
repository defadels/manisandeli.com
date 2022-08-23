<?php

namespace App\Http\Livewire\Website;

use Livewire\Component;
use Auth;
use App\Models\Produk;
use Cart;

class HomeComponent extends Component
{
    public function render()
    {

        if(Auth::check())
        {
            Cart::instance('cart')->store(Auth::user()->email);
        }

        return view('livewire.website.home-component')->layout('layout.website_layout');
    }
}
