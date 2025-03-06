<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slots extends Model
{
    public $table="courses_slot";
    use HasFactory;

    protected $fillable=[
        'course_id',
        'location',
        'date',
        'start_time',
        'end_time',
        'repeat',
        'staff_id',
    ];

    public function course(){
        return $this->belongsTo(Course::class,'course_id');

    }
    public function staff(){
        return $this->belongsTo(StaffMember::class,'staff_id');

    }
}
