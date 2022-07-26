<?php

namespace App\Http\Livewire\Admin\Penjualan;

use Livewire\Component;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Pengiriman;
use App\Models\Transaksi;

class OrderanProsesDetail extends Component
{
    public $orderan_id;

    public function mount($orderan_id) {
        $this->orderan_id = $orderan_id;
    }

    public function render()
    {
        $orderan = Order::find($this->orderan_id);

        $transaksi = Transaksi::where('orderan_id', $this->orderan_id)->first();

        return view('livewire.admin.penjualan.orderan-proses-detail', compact('orderan','transaksi'))->layout('layout.admin_layout');
    }

    public function konfirmasiOrderan(){
        $orderan = Order::find($this->orderan_id);

        if($orderan->transaksi->metode_pembayaran == 'Bayar di Toko'){

            $bayar = Transaksi::findOrFail($this->orderan_id, 'orderan_id');
            $bayar->status = 'Disetujui';
            $bayar->save(); 

            $orderan = Order::find($this->orderan_id);
            $orderan->status = 'selesai';
            $orderan->save();

            return redirect()->route('admin.orderan.selesai');

        } else if($orderan->transaksi->metode_pembayaran == 'COD') {
            $orderan = Order::find($this->orderan_id);

            $orderan->status = 'dikirim';
            $orderan->save();

            return redirect()->route('admin.orderan.dikirim');
        }
        
    }
}
