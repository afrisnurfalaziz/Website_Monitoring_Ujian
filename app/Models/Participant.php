<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'gender',
        'email',
        'phone',
        'address',
    ];

    public function examRegs()
    {
        return $this->hasMany(ExamReg::class);
    }
}
