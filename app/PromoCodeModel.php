<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PromoCodeModel extends Model
{
     protected $table = 'promo_code';
    protected $guarded = ['id'];
}
