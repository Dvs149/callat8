<?php

namespace App\dgmodel;

use DateTime;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $table = 'testimonial';
    public $timestamps = false;
    protected $guarded = [];

   /*  public function getDateAttribute()
    {
        $created_at = new DateTime($this->attributes['date']);
        return date_format($created_at, "d/m/Y");
    } */
}
