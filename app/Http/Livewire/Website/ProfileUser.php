<?php

namespace App\Http\Livewire\Website;

use Livewire\Component;
use App\Models\User;
use Livewire\WithFileUploads;
use Storage;
use Str;

class ProfileUser extends Component
{
    use WithFileUploads;

    public $nama, $email, $foto_profil, $getData, $userId, $fotoUrl;
    public $statusUpdate = false;
    

    public function showData($user){
        $this->nama = $user->nama;
        $this->email = $user->email;
        $this->foto_profil = $user->foto_profil;
        $this->userId = $user->id;
        $this->fotoUrl = $user->foto_profil;
    }

    public function mount($id){

        $this->userId = $id;

        $user = User::where('id', $id)->first();
        
        $this->nama = $user->nama;
        $this->email = $user->email;
        // $this->foto_profil = $user->foto_profil;
        $this->fotoUrl = $user->foto_profil;
    }

    public function render()
    {
        $user = User::find($this->userId);
        
        return view('livewire.website.profile-user', compact('user'))->layout('layout.website_layout');
    }

    public function getData($id){
        $user = User::where('id', $id)->first();
        
        $this->nama = $user->nama;
        $this->email = $user->email;
        // $this->foto_profil = $user['foto_profil'];
        $this->userId = $user->id;
        $this->fotoUrl = $user->foto_profil;

        $this->statusUpdate = true;


        $this->dispatchBrowserEvent('show-edit-profile-modal');
    }
}
