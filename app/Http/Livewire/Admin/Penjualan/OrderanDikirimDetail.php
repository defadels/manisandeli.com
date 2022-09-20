<?php

namespace App\Http\Livewire\Admin\Penjualan;

use Livewire\Component;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Pengiriman;
use App\Models\Transaksi;

class OrderanDikirimDetail extends Component
{
    public $orderan_id;

    public function mount($orderan_id) {
        $this->orderan_id = $orderan_id;
    }

    public function render()
    {
        $orderan = Order::find($this->orderan_id);

        $transaksi = Transaksi::where('orderan_id', $this->orderan_id)->first();

        return view('livewire.admin.penjualan.orderan-dikirim-detail', compact('orderan', 'transaksi'))->layout('layout.admin_layout');
    }

    public function konfirmasiOrderan(){
            $orderan = Order::find($this->orderan_id);
            $orderan->status = 'selesai';
            $orderan->save();

            $bayar = Transaksi::find($this->orderan_id, 'orderan_id');
            $bayar->status = 'Disetujui';
            $bayar->save(); 

            return redirect()->route('admin.orderan.selesai');

    }
}
