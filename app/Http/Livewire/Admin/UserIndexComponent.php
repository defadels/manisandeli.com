<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class UserIndexComponent extends Component
{
    public $search;
    public $statusUpdate = false;
    public $paginate = 5;

    protected $updateQueryString = ['search'];

    protected $listeners = [
        'userStored' => 'handleStored',
        'userUpdated' => 'handleUpdated',
        'userDeleted' => 'handleDeleted'
    ];

    public function render()
    {
        // $this->daftar_user = User::whereIn('roles', ['admin','owner'])->get();

        return view('livewire.admin.user-index-component',
        [
            'daftar_user' => $this->search == null ?
            User::latest()->where('roles', ['admin','owner'])->paginate($this->paginate) :
            User::whereIn('roles', ['admin','owner'])->latest()->where('nama', 'like', '%'.$this->search.'%')
            ->orWhere('email', 'like', '%'.$this->search.'%')
            ->paginate($this->paginate)
        ]) ->layout('layout.admin_layout');
    }

    public function handleStored($user){
        session()->flash('message', __('pesan.create',['module' => $user['nama']]));
    }

    public function handleUpdated($user){
        session()->flash('message', __('pesan.update',['module' => $user['nama']]));
    }
    
    public function handleDeleted($user){
        session()->flash('message', __('pesan.delete',['module' => $user['nama']]));
    }

    public function destroy($id){
        if($id){
            $user = User::find($id);
            $user->delete();

            $this->emit('userDeleted', $user);
        }
    }

    public function getData($id){
        $user = User::find($id);

        $this->statusUpdate = true;
        $this->emit('getData', $user);

    }
}
