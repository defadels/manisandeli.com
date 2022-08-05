<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;

class UserUpdateComponent extends Component
{

    public $nama, $email, $password, $roles, $userId;

    protected $listeners = [
        'getData' => 'showData'
    ];

    public function showData($user){
        $this->nama = $user['nama'];
        $this->email = $user['email'];
        $this->roles = $user['roles'];
        $this->userId = $user['id'];

    }

    public function render()
    {
        return view('livewire.admin.user-update-component');
    }

    public function updateUser(){
        $this->validate([
            'nama' => 'required|string',
            'email' => 'required|string|email|unique:users,email,'.$this->userId,
            'password'   => 'required',
            'roles'   => 'required',
        ],[
            'nama.required' => 'Nama sosmed harus diisi',
            'nama.string' =>'Nama sosmed harus string',
            'email.required' => 'Username harus diisi',
            'email.email' => 'Username harus string',
            'roles.required' => 'Role user harus diisi',
            'password.required' => 'Password harus diisi',
        ]);

        if($this->userId){
            $user = User::find($this->userId);

            $user->update([
                'nama' => $this->nama,
                'email' => $this->email,
                'roles' => $this->roles,
            ]);
        }

        $this->resetInput();
        $this->emit('userUpdated', $user);
    }

    private function resetInput(){
        $this->nama = null;
        $this->email = null;
        $this->password = null;
        $this->roles = null;
    }
}
