<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class ProfilTokoUpdate extends Component
{

    // public $statusUpdate = true;

    public $profilId, $nama, $email, $url, $nomor_hp;

    protected $listeners = [
        'getData' => 'showProfile'
    ];

    public function showProfile($profil){
        $this->nama = $profil['nama'];
        $this->email = $profil['email'];
        $this->url = $profil['url'];
        $this->nomor_hp = $profil['nomor_hp'];
    }

    public function render()
    {
        return view('livewire.admin.profil-toko-update');
    }

    public function resetInput(){
        $this->nama= null;
        $this->url = null;
        $this->nomor_hp = null;
        $this->email = null;
    }
}
