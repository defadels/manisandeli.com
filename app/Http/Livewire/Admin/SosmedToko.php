<?php

namespace App\Http\Livewire\Admin;

use Livewire\WithPagination;
use Livewire\Component;
use App\Models\SosmedTokoModel;

class SosmedToko extends Component
{

    protected $listeners = [
        'sosmedStored' => 'handleStored',
        'sosmedUpdated' => 'handleUpdated',
    ];


    public function render(){    
    

    $sosmed_toko = SosmedTokoModel::get();

        return view('livewire.admin.sosmed-toko',['sosmed_toko' => $sosmed_toko]);
    }


    public function handledStored($sosmed){
        session()->flash('message', __('pesan.create', ['module' => $sosmed_toko->nama]));
    }

    
}
