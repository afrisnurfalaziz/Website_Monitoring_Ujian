<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Monitoring extends Model
{
    use HasFactory;

    protected $fillable = [
        'exam_reg_id',
        'screenshot',
        'look_to',
        'time',
    ];

    public function examReg()
    {
        return $this->belongsTo(ExamReg::class);
    }
}
