<?php

namespace App\Http\Livewire\Admin\Penjualan;

use Livewire\Component;
use App\Models\Order;
use App\Models\Produk;
use App\Models\OrderItem;
use App\Models\Pengiriman;

class OrderanDikirim extends Component
{
    public function render()
    {
        return view('livewire.admin.penjualan.orderan-dikirim');
    }
}
