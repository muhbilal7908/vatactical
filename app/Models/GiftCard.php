<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GiftCard extends Model
{
    use HasFactory;


        public function variations()
        {
            return $this->hasMany(CardVariation::class, 'card_id', 'id');
        }

}
