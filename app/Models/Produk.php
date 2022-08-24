<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk';

    protected $guarded = [];

    protected $fillable = ['nama', 'harga_jual', 'harga_pokok', 'deskripsi', 'konten', 'foto_produk', 'kode_produk'];

    public function order_item() {
        return $this->belongsTo(OrderItem::class);
    }
}
