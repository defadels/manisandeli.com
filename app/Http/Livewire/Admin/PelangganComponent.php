<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use App\Models\AlamatPelanggan;
use Livewire\WithPagination;

class PelangganComponent extends Component
{
    public $search;
    public $paginate = 5;
    public $statusView = null;
    public $nama_lengkap, $email, $nomor_hp, $foto_profil, $alamat_pelanggan, $pelanggan;
    public $pelanggan_id = null;

    protected $updateQueryString = ['search'];

    public function getPelanggan($id){
        $pelanggan = User::findOrFail($id);

        $this->nama_lengkap = $pelanggan->nama;
        $this->email = $pelanggan->email;
        $this->foto_profil = $pelanggan->foto_profil;
        $this->nomor_hp = $pelanggan->nomor_hp;


        $this->alamat_pelanggan = AlamatPelanggan::where('pelanggan_id', $id)->get();

        $this->statusView = true;
        $this->emit('getPelanggan', $this->alamat_pelanggan);
    }

    public function render()
    
    {
        // $this->daftar_pelanggan = User::whereIn('roles',['admin'])->get();

        return view('livewire.admin.pelanggan-component',[
            'daftar_pelanggan'=>$this->search == null ?
            User::latest()->where('roles',['pelanggan'])->paginate($this->paginate) :
            User::whereIn('roles',['pelanggan'])->latest()->where('nama', 'like', '%'.$this->search.'%')
            ->orWhere('email', 'like', '%'.$this->search.'%')
            ->paginate($this->paginate)

        ])
        ->layout('layout.admin_layout');
        
        //     $daftar_pelanggan = User::where('roles', 'pelanggan')->get();

        // return view('livewire.admin.pelanggan-component',compact('daftar_pelanggan'))
        // ->layout('layout.admin_layout');
    }
}
