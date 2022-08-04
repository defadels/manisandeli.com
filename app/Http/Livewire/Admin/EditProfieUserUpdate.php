<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;

class EditProfieUserUpdate extends Component
{
    public $userId, $nama, $roles, $nomor_hp;

    public function mount($id) {
        $this->userId = $id;

        $user = User::where('id', $id)->first();
        $this->nama = $user->nama;
        $this->email = $user->email;
        $this->nomor_hp = $user->nomor_hp;
        $this->roles = $user->roles;
    }

    public function render()
    {
        return view('livewire.admin.edit-profie-user-update')->layout('layout.admin_layout');
    }

    public function update(){
        $user = User::find($this->userId);
        $this->validate([
            'nama' => 'required|string|max:25',
            'email' => 'email|required|unique:users,email,'.$user->id
        ]);

        $user->nama = $this->nama;
        $user->email = $this->email;
        $user->nomor_hp = $this->nomor_hp;
        $user->save();

        $this->resetInput();
        $this->emit('profileUpdated', $user);

        return redirect()->route('admin.profile-user', $this->userId)->with('message', __('pesan.update', ['module' => $user->nama]));
    }

    public function resetInput(){
        $this->nama =null;
        $this->email =null;
        $this->nomor_hp =null;
    }
}
