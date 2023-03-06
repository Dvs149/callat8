<?php

namespace App\dgmodel;

use Illuminate\Database\Eloquent\Model;

class CustomerRemarkModel extends Model
{
    protected $table = 'customer_remarks';
    public $timestamps = true;
    protected $guarded = ['id'];

    public function customer()
    {
        return $this->belongsTo('App\dgmodel\Customer','customer_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

}
