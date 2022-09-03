<?php

namespace App\Http\Livewire\Website;

use Livewire\Component;
use Auth;
use App\Models\Produk;
use App\Models\Slider;
use App\Models\Textarea;
use Cart;

class HomeComponent extends Component
{
    public function render()
    {

        if(Auth::check())
        {
            Cart::instance('cart')->store(Auth::user()->email);
        }

        $daftar_slider = Slider::get();
        $daftar_textarea = Textarea::get();

        return view('livewire.website.home-component',compact('daftar_slider','daftar_textarea'))->layout('layout.website_layout');
    }
}
