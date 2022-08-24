<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $table = 'order_item';

    public function order() {
        return $this->belongsTo(Order::class);
    }

    public function produk() {
        return $this->hasMany(Produk::class);
    }
}
