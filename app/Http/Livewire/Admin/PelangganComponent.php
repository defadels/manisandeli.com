<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class PelangganComponent extends Component
{
    public $search;
    public $paginate = 5;
    public $statusView = null;

    protected $updateQueryString = ['search'];

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
