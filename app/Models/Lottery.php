<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lottery extends Model
{
    use HasFactory;
    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }
    public function giftcard(){
        return $this->belongsTo(GiftCard::class,'gift_id');
    }
    public function course(){
        return $this->belongsTo(Course::class,'course_id');
    }

}
