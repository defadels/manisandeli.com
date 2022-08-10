<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class EditProfileUser extends Component
{   


    public $nama, $nomor_hp, $email, $roles, $userId;

    public function mount($id){

        $this->userId = $id;

        $user = User::where('id', $id)->first();
        
        $this->nama = $user->nama;
        $this->email = $user->email;
        $this->roles = $user->roles;
        $this->nomor_hp = $user->nomor_hp;
    }

    public function render()
    {
        $user = User::find($this->userId);

        return view('livewire.admin.edit-profile-user',compact('user'))->layout('layout.admin_layout');
    }
}
