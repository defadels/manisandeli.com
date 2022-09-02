<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table ='order';

    protected $guarded = [];

    // protected $primaryKey = 'transaksi_id';

    public function user(){
        return $this->belongsTo(User::class, 'pelanggan_id');
    }

    public function order_item(){
        return $this->hasMany(OrderItem::class, 'orderan_id');
    }

    public function pengiriman(){
        return $this->hasOne(Pengiriman::class, 'id');
    }

    public function transaksi(){
        return $this->hasOne(Transaksi::class, 'id');
    }

    
}
