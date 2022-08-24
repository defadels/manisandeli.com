<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table ='order';

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function order_item(){
        return $this->hasMany(OrderItem::class);
    }

    public function pengiriman(){
        return $this->hasOne(Pengiriman::class);
    }

    public function transaksi(){
        return $this->hasOne(Transaksi::class);
    }
}
