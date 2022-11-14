<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomer_induk',
        'nama_siswa',
        'jenis_kelamin',
        'telepon',
        'alamat',
        'email',
    ];
}
