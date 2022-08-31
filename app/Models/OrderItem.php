<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $table = 'order_item';

    public function order() {
        return $this->belongsTo(Order::class, 'orderan_id');
    }

    public function item() {
        return $this->hasMany(Produk::class, 'produk_id');
    }
}
