<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classs extends Model
{
    use HasFactory;

    protected $fillable=['name'];

    public function student(){
        return $this->hasMany(Student::class);
    }
    public function class_teacher(){
        return $this->hasMany(Class_Teacher::class);
    }

}
