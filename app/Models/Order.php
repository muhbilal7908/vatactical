<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'company_name',
        'email',
        'phone_no',
        'address',
        'appartment',
        'province',
        'city',
        'status',
        'postal_code',
        'status',

    ];

    public function order_items(){
        return $this->hasMany(OrderItem::class,'order_id','id');
    }
    public function membershipUsers(){
        return $this->hasMany(MemberShip::class,'order_id','id');
    }

}
