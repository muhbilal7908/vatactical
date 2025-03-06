<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LotteryOrder extends Model
{
    use HasFactory;
    public $table="lottery_orders";

    public function lottery(){
        return $this->belongsTo(Lottery::class,'lottery_id');
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
