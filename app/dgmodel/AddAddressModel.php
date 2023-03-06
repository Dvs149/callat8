<?php

namespace App\dgmodel;

use Illuminate\Database\Eloquent\Model;

class AddAddressModel extends Model
{
    protected $table = 'address_list';
    // public $timestamps = false;
    protected $guarded = [];
    public function customer()
    {
        return $this->belongsTo('App\dgmodel\Customer', 'user_id', 'id');
    }
}
