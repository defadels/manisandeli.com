<?php

namespace App\Http\Livewire\Website;

use Livewire\Component;

class KebijakanPrivasi extends Component
{
    public function render()
    {
        return view('livewire.website.kebijakan-privasi')->layout('layout.website_layout');
    }
}
