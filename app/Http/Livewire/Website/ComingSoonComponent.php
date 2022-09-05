<?php

namespace App\Http\Livewire\Website;

use Livewire\Component;
use App\Models\SosmedTokoModel;
use App\Models\ProfilTokoModels;

class ComingSoonComponent extends Component
{
    public function render()
    {

        $sosmed_toko = SosmedTokoModel::get();
        $profil_toko = ProfilTokoModels::first();

        return view('livewire.website.coming-soon-component',compact('sosmed_toko', 'profil_toko'))->layout('layout.website_layout');
    }
}
