<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\SosmedTokoModel;

class SosmedTokoUpdate extends Component
{

    public $nama, $username, $url, $status, $dataId, $sosmed;

    protected $listeners = [
        'getData' => 'showData'
    ];

    public function showData($sosmed){
        $this->nama = $sosmed['nama'];
        $this->username = $sosmed['username'];
        $this->url = $sosmed['url'];
        $this->status = $sosmed['status'];
    }

    public function render()
    {
        return view('livewire.admin.sosmed-toko-update');
    }

    public function update()
    {
        $this->validate([
            'nama' => 'required|string',
            'username' => 'required|string',
            'url'   => 'required',
        ]);

        if($this->dataId){
            $sosmed = SosmedTokoModel::find($this->dataId);

            $sosmed->nama = $this->nama;
            $sosmed->username = $this->username;
            $sosmed->url = $this->url;
            $sosmed->status = $this->status;
            $sosmed->save();

        }
        $this->resetInput();

           // $this->emit('sosmedUpdated', $sosmed);
        
       
            
    }

    private function resetInput(){
        $this->nama = null;
        $this->username = null;
        $this->url = null;
        $this->status = null;
    }
}
