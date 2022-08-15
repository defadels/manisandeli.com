<?php

namespace App\Http\Livewire\Website;

use Livewire\Component;

class ProdukComponent extends Component
{
    public function render()
    {
        return view('livewire.website.produk-component')->layout('layout.website_layout');
    }
}
