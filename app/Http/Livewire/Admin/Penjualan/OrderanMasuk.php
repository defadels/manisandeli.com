<?php

namespace App\Http\Livewire\Admin\Penjualan;

use Livewire\Component;
use App\Models\Order;
use App\Models\Produk;
use App\Models\OrderItem;

class OrderanMasuk extends Component
{
    public function render()
    {   
        $daftar_orderan = Order::where('status', 'masuk')->get();
        return view('livewire.admin.penjualan.orderan-masuk', compact('daftar_orderan'))->layout('layout.admin_layout');
    }
}
