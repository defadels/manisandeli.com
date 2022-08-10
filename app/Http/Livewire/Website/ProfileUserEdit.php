<?php

namespace App\Http\Livewire\Website;

use Livewire\Component;
use App\Models\User;
use Livewire\WithFileUploads;
use Storage;
use Str;


class ProfileUserEdit extends Component
{
    use WithFileUploads;

    public $nama, $email, $foto_profil, $getData, $userId;

    protected $listeners = [
        'getData' => 'showData'
    ];

    
    
    public function render()
    {
        return view('livewire.website.profile-user-edit')->layout('layout.website_layout');
    }

    
}
