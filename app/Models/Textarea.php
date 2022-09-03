<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Textarea extends Model
{
    use HasFactory;

    protected $table = 'textarea';

    protected $guarded = [];

    protected $fillable = ['judul', 'konten'];
}
