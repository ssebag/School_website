<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $fillable=['quiz_id','question','answer_1','answer_2','answer_3','right_answer','mark'];
    public function quiz(){
        return $this->belongsTo('App\Models\Quiz','quiz_id');
    }
}
