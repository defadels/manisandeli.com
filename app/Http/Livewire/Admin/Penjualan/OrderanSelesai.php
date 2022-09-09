<?php

namespace App\Http\Livewire\Admin\Penjualan;

use Livewire\Component;
use App\Models\Order;
use App\Models\Produk;
use App\Models\OrderItem;

class OrderanSelesai extends Component
{
    public $orderan_id;

    public function render()
    {
        $daftar_orderan = Order::where('status', 'selesai')->get();

        return view('livewire.admin.penjualan.orderan-selesai', compact('daftar_orderan'))->layout('layout.admin_layout');
    }
}
