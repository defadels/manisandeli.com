<?php

namespace App\Http\Livewire\Admin\Penjualan;

use Livewire\Component;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Pengiriman;

class OrderanMasukDetail extends Component
{

    public $orderan_id;

    public function mount($orderan_id) {
        $this->orderan_id = $orderan_id;
    }

    public function render()
    {
        $orderan = Order::find($this->orderan_id);

        return view('livewire.admin.penjualan.orderan-masuk-detail', compact('orderan'))->layout('layout.admin_layout');
    }

    public function konfirmasiOrderan(){
        $orderan = Order::find($this->orderan_id);

        $orderan->status = 'diproses';
        $orderan->save();

        return redirect()->route('admin.orderan.masuk');
    }
}
