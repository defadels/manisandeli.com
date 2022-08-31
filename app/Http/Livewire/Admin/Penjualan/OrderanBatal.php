<?php

namespace App\Http\Livewire\Admin\Penjualan;

use Livewire\Component;
use App\Models\Order;
use App\Models\Produk;
use App\Models\OrderItem;
use App\Models\Pengiriman;

class OrderanBatal extends Component
{
    public function render()
    {

        $daftar_orderan = Order::where('status', 'batal')->get();

        return view('livewire.admin.penjualan.orderan-batal', compact('daftar_orderan'))->layout('layout.admin_layout');
    }
}
