<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\ProfilToko;

class ProfilTokoCreate extends Component
{
    public $nama, $url, $email, $nomor_hp;

    public function render()
    {
        return view('livewire.admin.profil-toko-create');
    }

    public function store(){
        $this->validate([
            'nama' => 'required|string',
            'url' => 'required|string',
            'nomor_hp' => 'required|string',
            'email' => 'email|required',
        ],
        [
            'nama.required' => 'Nama toko harus diisi',
            'nama.string' => 'Nama toko harus diinput dengan string',
            'url.required' => 'URL toko harus diisi',
            'url.string' => 'URL toko harus diinput dengan string',
            'email.required' => 'Email toko harus diisi',
            'email.email' => 'Email toko harus diisi dengan kaidah email',
        ]);

        $profil = ProfilToko::create([
            'nama' => $this->nama,
            'url' => $this->url,
            'logo' => '$this->logo',
            'nomor_hp' => $this->nomor_hp,
            'email' => $this->email
        ]);

        $this->resetInput();
        $this->emit('profilCreated', $profil);
    }

    public function resetInput(){
        $this->nama= null;
        $this->url = null;
        $this->nomor_hp = null;
        $this->email = null;
    }
}
