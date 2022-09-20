<?php

namespace App\Http\Livewire\Website;

use Livewire\Component;
use App\Models\Produk;
use Livewire\WithPagination;
use Cart;
use Auth;

class DetailProduk extends Component
{   

    public $produk_id, $nextId, $prevId;

    public function mount($id){
        $this->produk_id = $id;
    }

    public function store($produk_id, $nama_produk, $harga_jual){
        Cart::instance('cart')->add($produk_id,$nama_produk,1,$harga_jual)->associate('App\Models\Produk');
        session()->flash('message', 'Produk masuk ke keranjang');

        return redirect()->route('website.detail.produk',$this->produk_id);
    }

    use WithPagination;


    public function render()
    {
        $produk = Produk::find($this->produk_id);

        $this->nextId = $this->produk_id+1;
        $this->prevId = $this->produk_id-1;

        $produk_selanjutnya = Produk::find($this->nextId);
        $produk_sebelumnya = Produk::find($this->prevId);

        $daftar_produk = Produk::paginate(10);

        if(Auth::check()){
            Cart::instance('cart')->store(Auth::user()->email);
        }

        return view('livewire.website.detail-produk', compact('produk','daftar_produk', 'produk_selanjutnya', 'produk_sebelumnya'))->layout('layout.website_layout');
    }
}
