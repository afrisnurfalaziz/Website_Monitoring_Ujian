<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    protected $fillable = [
        'exam_code',
        'exam_name',
        'exam_date',
    ];

    public function examRegs()
    {
        return $this->hasMany(ExamReg::class);
    }
}
