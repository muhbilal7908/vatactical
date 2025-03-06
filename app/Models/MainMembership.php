<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainMembership extends Model
{
    use HasFactory;
    protected $table ="memberships";

    public function membership()
    {
        return $this->belongsTo(GiftCard::class, 'membership_id', 'id');
    }

    public function members(){
        return $this->hasMany(Membership::class,'parent_membership_id','id');
    }
    
}
