<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseSubscribe extends Model
{
    public $table="subscription";
    use HasFactory;

    public function users(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function courses(){
        return $this->belongsTo(Course::class,'course_id');
    }
    public function slot(){
        return $this->belongsTo(Slots::class,'session_id','id');
    }
}
