<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    use HasFactory;
    protected $fillable=['quiz_id','student_id','full_mark','deserved_mark'];

    public function quiz(){
        return $this->belongsTo('App\Models\Quiz','quiz_id');
    }
    public function student(){
        return $this->belongsTo('App\Models\Student','student_id');
    }
}
