<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;
    protected $fillable=['class_teacher_id','date','done'];
    public function class_teacher(){
        return $this->belongsTo('App\Models\Class_teacher','class_teacher_id');
    }
    public function mark(){
        return $this->hasMany(Mark::class);
    }
    public function question(){
        return $this->hasMany(Question::class);
    }
}
