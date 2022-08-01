<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\SosmedTokoModel;

class SosmedTokoCreate extends Component
{
    
    public $nama, $username, $url, $status;

    public function render()
    {

        return view('livewire.admin.sosmed-toko-create');
    }

    public function store(){
        
        $this->validate([
            'nama' => 'required|string',
            'username' => 'required|string',
            'url'   => 'required',
        ],[
            'nama.required' => 'Nama sosmed harus diisi',
            'nama.string' =>'Nama sosmed harus string',
            'username.required' => 'Username harus diisi',
            'username.string' => 'Username harus string',
            'url' => 'URL sosmed harus diisi'
        ]);

        $sosmed =  SosmedTokoModel::create([
            'nama' => $this->nama,
            'username' => $this->username,
            'url' => $this->url,
            'status' => $this->status,
        ]);

        $this->resetInput();
        $this->emit('sosmedStored', $sosmed);   
        
    }

    private function resetInput(){
        $this->nama = null;
        $this->username = null;
        $this->url = null;
        $this->status = null;
    }
}
