<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MetodePembayaranPelanggan extends Model
{
    use HasFactory;

    protected $table = 'metode_pemabyaran_pelanggan';

    protected $guarded = [];
}
