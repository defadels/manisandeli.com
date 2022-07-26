<?php

namespace App\Http\Livewire\Website;

use Livewire\Component;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Transaksi;
use App\Models\Pengiriman;
use Auth;
use Storage;

class OrderankuComponent extends Component
{
    
    public function mount(){
        if(!Auth::check()){
            return redirect()->route('login');
        } 
    }

    public function render()
    {
            
        $daftar_orderan = Order::where('pelanggan_id', Auth::user()->id)->get();

            
        $transaksi = Transaksi::where('pelanggan_id', Auth::user()->id)->get();

            
        return view('livewire.website.orderanku-component',compact('daftar_orderan','transaksi'))->layout('layout.website_layout');
        
    }
}
