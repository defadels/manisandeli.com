<?php

namespace App\Http\Livewire\Admin\Penjualan;

use Livewire\Component;
use App\Models\Order;
use App\Models\Produk;
use App\Models\OrderItem;


class OrderanProses extends Component
{
    public function render()
    {
        $daftar_orderan = Order::where('status', 'proses')->get();

        return view('livewire.admin.penjualan.orderan-proses', compact('daftar_orderan'))->layout('layout.admin_layout');
    }
}
