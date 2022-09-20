<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';

    // protected $primaryKey = 'transaksi_id';

    protected $guarded = [];

    public function order() {
        return $this->belongsTo(Order::class. 'transaksi_id');
    }
}
