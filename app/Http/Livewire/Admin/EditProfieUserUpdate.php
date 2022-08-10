<?php

namespace App\Http\Livewire\Admin;

use Str;
use Image;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class EditProfieUserUpdate extends Component
{


    use WithFileUploads;

    public $userId, $nama, $roles, $nomor_hp, $foto_profil, $fotoUrl;

    public function mount($id) {
        $this->userId = $id;

        $user = User::where('id', $id)->first();
        $this->nama = $user->nama;
        $this->email = $user->email;
        $this->nomor_hp = $user->nomor_hp;
        $this->roles = $user->roles;
        $this->fotoUrl = $user->foto_profil;
    }

    public function render()
    {
        return view('livewire.admin.edit-profie-user-update')->layout('layout.admin_layout');
    }

    public function update(){
        $user = User::find($this->userId);
        $this->validate([
            'nama' => 'required|string|max:25',
            'email' => 'email|required|unique:users,email,'.$user->id,
            'foto_profil' => 'mimes:jpeg,jpg,png|max:10240'
        ]);

        $user->nama = $this->nama;
        $user->email = $this->email;
        $user->nomor_hp = $this->nomor_hp;

        if($this->foto_profil){
            $foto_lama = $this->foto_profil;

            $nama_file = Str::uuid();

            $path ='user/foto/';
            $file_extension = $this->foto_profil->extension();
            $user->foto_profil = $path.$nama_file.".".$file_extension;

            $gambar = $this->foto_profil;
            $destinationPath = storage_path('/app/public/');

            $img = Image::make($gambar->path());
            $img->fit(450, 450, function($cons){
                $cons->aspectRatio();
            })->save($destinationPath.$user->foto_profil);

            Storage::disk('public')->delete($foto_lama);
        }
        
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
