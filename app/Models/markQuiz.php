<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class markQuiz extends Model
{
    protected $fillable=[
        'quiz_id',
        'student_id',
        'score',
        'mark',
        'question_id',
        'abuse',
    ];
    use HasFactory;
}
