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
    

    public function mount($id){

        $this->userId = $id;

        $user = User::where('id', $id)->first();
        
        $this->nama = $user->nama;
        $this->email = $user->email;
        $this->nomor_hp = $user->nomor_hp;
        // $this->foto_profil = $user->foto_profil;
        $this->fotoUrl = $user->foto_profil;


    }

    // function untuk render tampilan

    public function render()
    {
        $user = User::find($this->userId);

        $daftar_alamat = AlamatPelanggan::where('pelanggan_id', $this->userId)->get();

        $daftar_pembayaran = MetodePembayaranPelanggan::where('pelanggan_id', $this->userId)->get();
        
        return view('livewire.website.profile-user', compact('user', 'daftar_alamat', 'daftar_pembayaran'))->layout('layout.website_layout');
    }

    // update data profil user

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
        
        $this->resetInputUser();
        $user->save();

        session()->flash('message', __('pesan.update', ['module' => $user->nama]));

        $this->dispatchBrowserEvent('close-modal');
    }

    // dapatkan data dari tombol function ini dengan parameter $id

    public function getData($id){
        $user = User::where('id', $id)->first();
        
        $this->nama = $user->nama;
        $this->email = $user->email;
        $this->userId = $user->id;
        $this->fotoUrl = $user->foto_profil;
        $this->nomor_hp = $user->nomor_hp;
        $this->statusUpdate = true;


        $this->dispatchBrowserEvent('show-edit-profile-modal');
    }

    private function resetInputUser(){
        $this->nama = null;
        $this->email = null;
        $this->fotoUrl = null;
        $this->nomor_hp = null;
    }

    // Proses data alamat pelanggan
    
        // Deklarasi public variabel untuk alamat
            
            public $label, $alamat, $longitude, $latitude, $getDataAlamat, $alamatId;

            // tambah data

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

                $this->resetInputAddress();
                session()->flash('message', __('pesan.create', ['module' => $alamat->label]));

                $this->dispatchBrowserEvent('close-modal');
            }

            // update data

            public function updateAddress() {
                $alamat = AlamatPelanggan::find($this->alamatId);

                $this->validate([
                    'label' => 'required|string',
                    'alamat' => 'required|string|max:100'
                ]);

                $alamat->label = $this->label;
                $alamat->alamat = $this->alamat;

                $alamat->save();

                $this->resetInputAddress();
                session()->flash('message', __('pesan.update', ['module' => $alamat->label]));

                $this->dispatchBrowserEvent('close-modal');
            }

            // hapus data alamat

            public function destroyAddress($id){
                if($id){
                    $alamat = AlamatPelanggan::find($id);
                    $alamat->delete();

                    session()->flash('message', __('pesan.delete', ['module' => $alamat->label]));
                }
            }

            // dapatkan data dari tombol function ini dengan parameter $id

            public function getDataAlamat($id){
                $alamat = AlamatPelanggan::where('id', $id)->first();
                
                $this->label = $alamat->label;
                $this->alamat = $alamat->alamat;
                $this->alamatId = $alamat->id;
                $this->statusUpdate = true;


                $this->dispatchBrowserEvent('show-edit-address-modal');
            }

            private function resetInputAddress(){
                $this->label = null;
                $this->alamat = null;
               
            }

    // Proses data metode pembayaran pelanggan

    // Deklarasi public variabel untuk alamat
            
    public $nama_pemilik, $nomor_rekening, $deskripsi, $jenis, $getDataPembayaran, $pembayaranId, $status;

    // tambah data

    public function createPayment(){
        $this->validate([
            'nama' => 'required|string',
            'nama_pemilik' => 'required|string',
            'nomor_rekening' => 'required|string',
            'jenis' => 'required',
            'deskripsi' => 'required|string|max:100'
        ]);

        $pembayaran = MetodePembayaranPelanggan::create([
            'pelanggan_id' => $this->userId,
            'nama' => $this->nama,
            'nama_pemilik' => $this->nama_pemilik,
            'nomor_rekening' => $this->nomor_rekening,
            'deskripsi' => $this->deskripsi,
            'jenis' => $this->jenis,
            'status' => $this->status,
        ]);

        $this->resetInputPayment();
        session()->flash('message', __('pesan.create', ['module' => $pembayaran->nama_pemilik]));

        $this->dispatchBrowserEvent('close-modal');
    }

    // update data

    public function updatePayment() {
        $pembayaran = MetodePembayaranPelanggan::find($this->alamatId);

        $this->validate([
            'nama' => 'required|string',
            'nama_pemilik' => 'required|string',
            'nomor_rekening' => 'required|string',
            'jenis' => 'required',
            'deskripsi' => 'required|string|max:100'
        ]);

        $pembayaran->nama = $this->nama;
        $pembayaran->nama_pemilik = $this->nama_pemilik;
        $pembayaran->nomor_rekening = $this->nomor_rekening;
        $pembayaran->jenis = $this->jenis;
        $pembayaran->deskripsi = $this->deskripsi;
        $pembayaran->jenis = $this->jenis;
        $pembayaran->status = $this->status;

        $pembayaran->save();
        $this->resetInputPayment();
        session()->flash('message', __('pesan.update', ['module' => $pembayaran->nama_pemilik]));

        $this->dispatchBrowserEvent('close-modal');
    }

    // hapus data alamat

    public function destoryPayment($id){
        if($id){
            $pembayaran = MetodePembayaranPelanggan::find($id);
            $pembayaran->delete();

            session()->flash('message', __('pesan.delete', ['module' => $pembayaran->nama_pemilik]));
        }
    }

    // dapatkan data dari tombol function ini dengan parameter $id

    public function getDataPembayaran($id){
        $pembayaran = MetodePembayaranPelanggan::where('id', $id)->first();
        
        $this->label = $pembayaran->label;
        $this->nama = $pembayaran->nama;
        $this->nama_pemilik = $pembayaran->nama_pemilik;
        $this->nomor_rekening = $pembayaran->nomor_rekening;
        $this->deskripsi = $pembayaran->deskripsi;
        $this->status = $pembayaran->status;
        $this->jenis = $pembayaran->jenis;
        $this->pembayaranId = $pembayaran->id;
        $this->statusUpdate = true;


        $this->dispatchBrowserEvent('show-edit-payment-modal');
    }

    private function resetInputPayment(){
        $this->label = null;
        $this->nama = null;
        $this->nama_pemilik = null;
        $this->nomor_rekening = null;
        $this->deskripsi = null;
        $this->status = null;
        $this->jenis = null;
    }
}
