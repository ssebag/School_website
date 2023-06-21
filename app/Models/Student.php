<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Student extends Model
{
    use Notifiable;
    use HasFactory;
    protected $fillable=['user_id','class_id','birth','gender'];

    public function class(){
        return $this->belongsTo('App\Models\Classs','class_id');
    }
    public function mark(){
        return $this->hasMany(Mark::class);
    }
    public function user(){
        return $this->belongsTo('App\Models\User','user_id');
    }

}
