<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;

class PelangganComponent extends Component
{
    public $daftar_pelanggan;

    public function render()
    
    {
        $this->daftar_pelanggan = User::whereIn('roles',['pelanggan','admin'])->get();

        return view('livewire.admin.pelanggan-component',['daftar_pelanggan'=>$this->daftar_pelanggan])
        ->layout('layout.admin_layout');
    }
}
