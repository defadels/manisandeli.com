<?php

namespace App\Http\Livewire\Website;

use Livewire\Component;
use App\Models\ProfilTokoModels;
use App\Models\SosmedTokoModel;
use App\Models\Produk;
use Cart;
use Auth;
use Storage;

class TentangKami extends Component
{
    public function render()
    {
        $profil_toko = ProfilTokoModels::first();

        $sosmed_toko = SosmedTokoModel::get();

        $daftar_produk = Produk::inRandomOrder()->limit(4)->get();

        if(Auth::check()){
            Cart::instance('cart')->restore(Auth::user()->email);  
         
         }
        return view('livewire.website.tentang-kami', compact('profil_toko','sosmed_toko','daftar_produk'))->layout('layout.website_layout');
    }
}
