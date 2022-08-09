<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\ProfilToko;
use Livewire\WithFileUploads;
use Storage;

class ProfilTokoUpdate extends Component
{

    use WithFileUploads;

    // public $statusUpdate = true;

    public $profilId, $nama, $email, $url, $nomor_hp, $logo, $logoUrl;

    // protected $listeners = [
    //     'getData' => 'showProfile'
    // ];

    public function mount($id){
        
        $this->profilId = $id;

        $profil = ProfilToko::where('id', $id)->first(); 
        $this->nama = $profil->nama;
        $this->email = $profil->email;
        $this->url = $profil->url;
        $this->nomor_hp = $profil->nomor_hp;
        $this->logoUrl = $profil->logo;
    }


    public function render()
    {
        return view('livewire.admin.profil-toko-update')->layout('layout.admin_layout');
    }

    public function update(){
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

        $profil = ProfilToko::find($this->profilId);
        $profil->nama = $this->nama;
        $profil->email = $this->email;
        $profil->url = $this->url;
        $profil->nomor_hp = $this->nomor_hp;
        $profil->save();

        $this->resetInput();

        return redirect()->route('admin.pengaturan.profil-toko')
        ->with('message', __('pesan.update', ['module' => $profil->nama]));
    }

    public function resetInput(){
        $this->nama= null;
        $this->url = null;
        $this->nomor_hp = null;
        $this->email = null;
    }
}
