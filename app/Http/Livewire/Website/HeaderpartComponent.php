<?php

namespace App\Http\Livewire\Website;

use Livewire\Component;
use Cart;
use App\Models\SosmedTokoModel;
use App\Models\ProfilTokoModels;
use Auth;

class HeaderpartComponent extends Component
{
    public function render()
    {
        $sosmed_toko = SosmedTokoModel::get();
        $profil = ProfilTokoModels::get()->first();
        return view('livewire.website.headerpart-component',compact('sosmed_toko', 'profil'));
    }
}
