<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\ProfilTokoModels;

class ProfilToko extends Component
{
    public $statusUpdate = false;

    public function render()
    {
        $profil = ProfilTokoModels::get()->first();

        return view('livewire.admin.profil-toko',['profil' => $profil]);
    }

    public function getData($id){
        $profil = ProfilTokoModels::find($id);

        $this->statusUpdate = true;
        $this->emit('getData', $profil);
    }
}
