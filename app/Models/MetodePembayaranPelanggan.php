<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MetodePembayaranPelanggan extends Model
{
    use HasFactory;

    protected $table = 'metode_pembayaran_pelanggan';

    protected $guarded = [];

    public function pembayaran_pelanggan(){
        $this->belongsTo('App\Models\User', 'pelanggan_id')->withDefault();
    }
}
