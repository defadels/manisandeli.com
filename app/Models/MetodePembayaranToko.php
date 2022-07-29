<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MetodePembayaranToko extends Model
{
    use HasFactory;

    protected $table = 'metode_pembayaran_toko';

    protected $guarded = [];
}
