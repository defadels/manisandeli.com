<?php

namespace App\Http\Livewire\Admin\Penjualan;

use Livewire\Component;
use App\Models\Order;
use App\Models\Produk;
use App\Models\OrderItem;
use App\Models\Pengiriman;

class OrderanDikirim extends Component
{
    public $statusUpdate =false;

    public $orderan_id;

    public function render()
    {
        $daftar_orderan = Order::where('status', 'dikirim')->get();
        return view('livewire.admin.penjualan.orderan-dikirim', compact('daftar_orderan'))->layout('layout.admin_layout');
    }

    public function batalkanOrderan(){
        $orderan = Order::find($this->orderan_id);

        $orderan->status = 'batal';
        $orderan->save();

        $this->orderan_id = null;
        session()->flash('message', __('pesan.update', ['module' => $orderan->invoice]));
        $this->dispatchBrowserEvent('close-modal');
    }

    public function getOrder($id){
        $orderan = Order::where('id', $id)->first();

        // dd($orderan);


        $this->orderan_id = $orderan->id;

        // dd($this->orderan_id);

        $this->statusUpdate = true;

        $this->dispatchBrowserEvent('show-modal');

    }
}
