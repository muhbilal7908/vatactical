<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{



    public $table ="orders_item";


    public function products(){
        return $this->belongsTo(Product::class,'product_id');
    }
    public function gift_card(){
        return $this->belongsTo(GiftCard::class,'gift_card_id');
    }
    public function orders(){
        return $this->belongsTo(Order::class,'order_id');
    }



    use HasFactory;

    // protected $fillable = [
    //     'order_id',
    //     'product_id',
    //     'quantity',
    //     'sub_total',
    // ];
}
