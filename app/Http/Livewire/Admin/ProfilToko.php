<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\ProfilTokoModels;

class ProfilToko extends Component
{
    public $statusUpdate = false;

    public $listeners = [
        'profilStored' => 'handleStored',
        'profilUpdated' => 'handleUpdated'
    ];

    public function render()
    {
        $profil = ProfilTokoModels::get()->first();

        return view('livewire.admin.profil-toko',['profil' => $profil]);
    }

    public function handleStored($profil) {
        session()->flash('message', __('pesan.crate', ['module' => $profil['nama']]));
    }

    public function handleUpdated($profil){
        session()->flash('message', __('pesan.update', ['module' => $profil['nama']]));
    }

    public function getData($id){
        $profil = ProfilTokoModels::find($id);

        $this->statusUpdate = true;
        $this->emit('getData', $profil);
    }
}
