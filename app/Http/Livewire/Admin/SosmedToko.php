<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\SosmedTokoModel;

class SosmedToko extends Component
{

    public $sosmed_toko;
    public $statusUpdate = false;

    protected $listeners = [
        'sosmedStored' => 'handleStored',
        'sosmedUpdated' => 'handleUpdated',
        'sosmedDeleted' => 'handleDeleted'
    ];


    public function render(){    
    

    $this->sosmed_toko = SosmedTokoModel::get();

        return view('livewire.admin.sosmed-toko',['sosmed_toko' => $this->sosmed_toko]);
    }


    public function destroy($id){
        if($id) {
            $sosmed = SosmedTokoModel::find($id);
            $sosmed->delete();
            $this->emit('sosmedDeleted', $sosmed); 
        }
    }

    public function handleDeleted($sosmed){
        session()->flash('message', __('pesan.delete', ['module' => $sosmed['nama']]));
    }

    public function handleStored($sosmed){
        session()->flash('message', __('pesan.create', ['module' => $sosmed['nama']]));
    }

    public function handleUpdated($sosmed){
        session()->flash('message', __('pesan.update', ['module' => $sosmed['nama']]));
    }
    
    public function getData($id){
        $sosmed = SosmedTokoModel::find($id);

        $this->statusUpdate = true;
        $this->emit('getData', $sosmed);
    }
}
