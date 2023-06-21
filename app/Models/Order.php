<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable=[
        'class_teacher_id',
        'date',
    ];
    public function class_teacher(){
        return $this->belongsTo('App\Models\Class_teacher','class_teacher_id');
    }
}
