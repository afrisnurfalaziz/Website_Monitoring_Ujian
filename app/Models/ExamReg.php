<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamReg extends Model
{
    use HasFactory;

    protected $fillable = [
        'exam_id',
        'participant_id',
    ];

    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }

    public function participant()
    {
        return $this->belongsTo(Participant::class);
    }

    public function monitorings()
    {
        return $this->hasMany(Monitoring::class);
    }
}
