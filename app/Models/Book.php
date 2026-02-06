<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'kode',
        'judul',
        'pengarang',
        'penerbit',
        'tanggal_terbit',
        'cover',
    ];
}
