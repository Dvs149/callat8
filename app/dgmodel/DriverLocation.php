<?php

namespace App\dgmodel;

use Illuminate\Database\Eloquent\Model;

class DriverLocation extends Model
{
    protected $table = 'driver_location';
    public $timestamps = false;
    protected $guarded = [];

    public function driver()
    {
        return $this->belongsTo('App\dgmodel\Driver', 'driver_id', 'id');
    }
}
