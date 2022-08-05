<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class UserCreateComponent extends Component
{
    public $nama, $email, $password, $roles;

    public function render()
    {
        return view('livewire.admin.user-create-component');
    }

    public function store(){
        
        $this->validate([
            'nama' => 'required|string',
            'email' => 'required|string|email',
            'password'   => 'required',
            'roles'   => 'required',
        ],[
            'nama.required' => 'Nama sosmed harus diisi',
            'nama.string' =>'Nama sosmed harus string',
            'email.required' => 'Username harus diisi',
            'email.email' => 'Username harus string',
            'roles.required' => 'Role user harus diisi',
            'passsword.required' => 'Password harus diisi',
            
        ]);

        $user =  User::create([
            'nama' => $this->nama,
            'email' => $this->email,
            'roles' => $this->roles,
            'password' => Hash::make($this->password),
        ]);

        $this->resetInput();
        $this->emit('userStored', $user);   
        
    }

    private function resetInput(){
        $this->nama = null;
        $this->email = null;
        $this->password = null;
        $this->roles = null;
    }
}
