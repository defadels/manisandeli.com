<?php

namespace App\Http\Livewire\Website;

use Livewire\Component;
use App\Models\ProfilTokoModels;
use Storage;


class KonfirmasiComponent extends Component
{
    public function render()
    {
        $profil_toko = ProfilTokoModels::first();

        return view('livewire.website.konfirmasi-component',compact('profil_toko'))->layout('layout.website_layout');
    }
}
