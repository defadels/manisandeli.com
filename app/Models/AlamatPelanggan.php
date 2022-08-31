<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlamatPelanggan extends Model
{
    use HasFactory;

    protected $table = 'alamat';

    protected $guarded = [];

    public function alamat_pelanggan(){
        return $this->belongsTo('App\Models\User', 'pelanggan_id')->withDefault();
    }
}
