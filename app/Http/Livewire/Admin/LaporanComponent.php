<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Transaksi;
use App\Models\Pengiriman;

class LaporanComponent extends Component
{
    public function render()
    {

        $orderan = OrderItem::get();

        return view('livewire.admin.laporan-component',compact('orderan'))->layout('layout.admin_layout');
    }
}
