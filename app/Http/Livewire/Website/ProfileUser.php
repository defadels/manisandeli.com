<?php

namespace App\Http\Livewire\Website;

use Livewire\Component;

class ProfileUser extends Component
{
    public function render()
    {
        return view('livewire.website.profile-user')->layout('layout.website_layout');
    }
}
