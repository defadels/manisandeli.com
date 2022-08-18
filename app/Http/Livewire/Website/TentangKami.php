<?php

namespace App\Http\Livewire\Website;

use Livewire\Component;
use App\Models\ProfilTokoModels;

class TentangKami extends Component
{
    public function render()
    {
        $profil_toko = ProfilTokoModels::first();
        return view('livewire.website.tentang-kami', compact('profil_toko'))->layout('layout.website_layout');
    }
}
