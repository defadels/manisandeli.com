<?php

namespace App\Http\Livewire\Website;

use Str;
use Storage;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\AlamatPelanggan;
use Intervention\Image\Facades\Image;
use App\Models\MetodePembayaranPelanggan;

class ProfileUser extends Component
{
    use WithFileUploads;

    public $nama, $email, $foto_profil, $getData, $userId, $fotoUrl, $nomor_hp;
    public $statusUpdate = false;
    

    // public function showData($user){
    //     $this->nama = $user->nama;
    //     $this->email = $user->email;
    //     $this->foto_profil = $user->foto_profil;
    //     $this->userId = $user->id;
    //     $this->fotoUrl = $user->foto_profil;
    // }

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

        $daftar_alamat = AlamatPelanggan::where('pelanggan_id', $this->userId)->get();

        $daftar_pembayaran = MetodePembayaranPelanggan::where('pelanggan_id', $this->userId)->get();
        
        return view('livewire.website.profile-user', compact('user', 'daftar_alamat', 'daftar_pembayaran'))->layout('layout.website_layout');
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

    // Proses data alamat pelanggan
    
    public $label, $alamat, $longitude, $latitude, $getDataAlamat, $alamatId;

    public function createAddress(){
        $this->validate([
            'label' => 'required|string',
            'alamat' => 'required|string|max:100'
        ]);

        $alamat = AlamatPelanggan::create([
            'pelanggan_id' => $this->userId,
            'label' => $this->label,
            'alamat' => $this->alamat,
        ]);

        $this->dispatchBrowserEvent('close-modal');
    }

    public function updateAddress() {
        $alamat = AlamatPelanggan::find($this->alamatId);

        $this->validate([
            'label' => 'required|string',
            'alamat' => 'required|string|max:100'
        ]);

        $alamat->label = $this->label;
        $alamat->alamat = $this->alamat;

        $alamat->save();
        session()->flash('message', __('pesan.update', ['module' => $alamat->label]));

        $this->dispatchBrowserEvent('close-modal');
    }

    public function getDataAlamat($id){
        $alamat = AlamatPelanggan::where('id', $id)->first();
        
        $this->label = $alamat->label;
        $this->alamat = $alamat->alamat;
        $this->alamatId = $alamat->id;
        $this->statusUpdate = true;


        $this->dispatchBrowserEvent('show-edit-address-modal');
    }

    // Proses data metode pembayaran pelanggan
}
