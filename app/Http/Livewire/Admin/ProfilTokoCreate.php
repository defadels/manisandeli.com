<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\ProfilTokoModels;
use Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProfilTokoCreate extends Component
{
    use WithFileUploads;

    public $nama, $url, $email, $nomor_hp, $logo;

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

        $profil = ProfilTokoModels::create([
            'nama' => $this->nama,
            'url' => $this->url,
            'logo' => $this->logo,
            'nomor_hp' => $this->nomor_hp,
            'email' => $this->email
        ]);

        if($this->logo){
            $nama_file = Str::uuid();

            $path ='profil/';
            $file_extension = $this->logo->extension();
            $profil->logo = $path.$nama_file.".".$file_extension;

            $gambar = $this->logo;
            $destinationPath = storage_path('/app/public/');

            $img = Image::make($gambar->path());
            $img->fit(450, 450, function($cons){
                $cons->aspectRatio();
            })->save($destinationPath.$profil->logo);

            $profil->save();
        }

        $this->resetInput();
        return redirect()->route('admin.pengaturan.profil-toko')
        ->with('message', __('pesan.create', ['module' => $profil->nama]));
    }

    public function resetInput(){
        $this->nama= null;
        $this->logo = null;
        $this->url = null;
        $this->nomor_hp = null;
        $this->email = null;
    }
}
