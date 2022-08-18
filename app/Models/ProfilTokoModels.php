<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilTokoModels extends Model
{
    use HasFactory;

    protected $table = 'profil_toko';
    protected $guarded = [];
    protected $fillable = ['nama', 'url', 'logo', 'email', 'alamat', 'nomor_hp'];
}
