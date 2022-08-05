<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\SosmedTokoModel;

class SosmedToko extends Component
{

    public $search;
    public $statusUpdate = false;
    public $paginate = 5;

    protected $listeners = [
        'sosmedStored' => 'handleStored',
        'sosmedUpdated' => 'handleUpdated',
        'sosmedDeleted' => 'handleDeleted'
    ];
    protected $updateQueryString = ['search'];

    public function mount(){
        $this->search = request()->query('search', $this->search);
    }

    public function render(){    
    

    // $this->sosmed_toko = SosmedTokoModel::get();

        return view('livewire.admin.sosmed-toko',[
            'sosmed_toko' => $this->search == null ?
            SosmedTokoModel::latest()->paginate($this->paginate) :
            SosmedTokoModel::latest()->where('nama','like', '%'.$this->search.'%')
            ->orWhere('status', 'like', '%'.$this->search.'%')
            ->orWhere('username', 'like', '%'.$this->search.'%')
            ->paginate($this->paginate)
        ]);
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
