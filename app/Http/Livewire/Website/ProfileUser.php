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

    public $nama, $email, $foto_profil, $getData, $userId, $fotoUrl, $nomor_hp;
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
        $this->nomor_hp = $user->nomor_hp;
        // $this->foto_profil = $user->foto_profil;
        $this->fotoUrl = $user->foto_profil;
    }

    public function render()
    {
        $user = User::find($this->userId);
        
        return view('livewire.website.profile-user', compact('user'))->layout('layout.website_layout');
    }

    public function userUpdate(){
        $user = User::find($this->userId);
        $this->validate([
            'nama' => 'required|string|max:25',
            'email' => 'email|required|unique:users,email,'.$user->id,
            'foto_profil' => 'mimes:jpeg,jpg,png|max:10240|nullable'
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

        session()->flash('message', __('pesan.update', ['module' => $user->nama]));

        $this->dispatchBrowserEvent('close-modal');
    }

    public function getData($id){
        $user = User::where('id', $id)->first();
        
        $this->nama = $user->nama;
        $this->email = $user->email;
        // $this->foto_profil = $user['foto_profil'];
        $this->userId = $user->id;
        $this->fotoUrl = $user->foto_profil;
        $this->nomor_hp = $user->nomor_hp;
        $this->statusUpdate = true;


        $this->dispatchBrowserEvent('show-edit-profile-modal');
    }
}
