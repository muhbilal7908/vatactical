<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CardVariation extends Model
{
    use HasFactory;
    protected $table = "card_variations";

    protected $fillable=[
        'card_id',
        'variation_name',
        'price',
        'navbar',
    ];
}
