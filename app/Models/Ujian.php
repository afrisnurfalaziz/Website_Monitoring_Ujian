<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ujian extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_ujian',
        'nama_ujian',
        'kode_ujian',
        'tanggal_ujian',
    ];
}
