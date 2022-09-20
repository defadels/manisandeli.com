<?php

namespace App\Http\Livewire\Admin\Penjualan;

use Livewire\Component;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Pengiriman;
use App\Models\ProfilTokoModels;
use Storage;

class OrderanPrint extends Component
{
    public $orderan_id;

    public function mount($orderan_id) {
        $this->orderan_id = $orderan_id;
    }

    public function render()
    {

        $orderan = Order::find($this->orderan_id);

        $profil_toko = ProfilTokoModels::first();

        return view('livewire.admin.penjualan.orderan-print',compact('orderan','profil_toko'))->layout('layout.admin_layout');
    }
}
