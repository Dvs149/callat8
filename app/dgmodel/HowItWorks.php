<?php

namespace App\dgmodel;

use Illuminate\Database\Eloquent\Model;

class HowItWorks extends Model
{
    protected $table = 'how_it_works';
    public $timestamps = false;
    protected $guarded = ['id'];
}
