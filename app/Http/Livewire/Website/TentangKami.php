<?php

namespace App\Http\Livewire\Website;

use Livewire\Component;
use App\Models\ProfilTokoModels;
use App\Models\SosmedTokoModel;
use Cart;
use Auth;

class TentangKami extends Component
{
    public function render()
    {
        $profil_toko = ProfilTokoModels::first();

        $sosmed_toko = SosmedTokoModel::get();

        if(Auth::check()){
            Cart::instance('cart')->restore(Auth::user()->email);  
         
         }
        return view('livewire.website.tentang-kami', compact('profil_toko','sosmed_toko'))->layout('layout.website_layout');
    }
}
