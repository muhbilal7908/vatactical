<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingModel extends Model
{
    public $table="general_settings";
    use HasFactory;

    protected $fillable = [
        'logo',
        'footer_logo',
        'footer_tagline',
        'email',
        'address',
        'phone_no',
        'facebook',
        'instagram',
        'twitter',
        'pinterest',
        'meta_title',
        'meta_description',
    ];

}
