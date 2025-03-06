<?php

namespace App\CPU;
use App\Models\Lottery;

class LotteryManager
{
    public static function lottery_price($id){
        $price=Lottery::find($id);
        dd($price);
    }



}
