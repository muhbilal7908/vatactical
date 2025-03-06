<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    public function slots(){
        return $this->hasMany(Slots::class, 'course_id','id');
    }

    public function subscriptions(){
        return $this->hasMany(CourseSubscribe::class,'user_id','id');
    }

}
