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
    public $nama, $email, $nomor_hp, $foto_profil, $pelanggan_id, $alamat_pelanggan;

    protected $updateQueryString = ['search'];

    public function getPelanggan($id){
        $pelanggan = User::find($this->pelanggan_id);


        $this->alamat_pelanggan = AlamatPelanggan::where('pelanggan_id', $this->pelanggan_id)->get();

        $this->statusView = true;
        $this->emit('getPelanggan', $pelanggan, $this->alamat_pelanggan);
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
    }
}
