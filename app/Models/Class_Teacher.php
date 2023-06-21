<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Class_Teacher extends Model
{
    use HasFactory;

    protected $fillable=['class_id','user_id','subject_id'];
    public function class(){
        return $this->belongsTo('App\Models\Classs','class_id');
    }
    public function user(){
        return $this->belongsTo('App\Models\User','user_id');
    }
    public function quiz(){
        return $this->hasMany(Quiz::class);
    }
    public function order(){
        return $this->hasMany(Oreder::class);
    }
    public function subject(){
        return $this->belongsTo('App\Models\Subject','subject_id');
    }
}
