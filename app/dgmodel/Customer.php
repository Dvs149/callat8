<?php

namespace App\dgmodel;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customer';
    public $timestamps = false;
    protected $guarded = ['id'];
    protected $hidden = [
        'password',
    ];

    public function doubleGoogleOrder()
    {
        return $this->hasMany('App\DoubleGoogleOrderModel','user_id','id');
    }
    public function delete()
    {
        // delete all related photos 
        $this->doubleGoogleOrder()->delete();
        $this->addAddress()->delete();
        // as suggested by Dirk in comment,
        // it's an uglier alternative, but faster
        // Photo::where("user_id", $this->id)->delete()

        // delete the user
        return parent::delete();
    }
    public function addAddress()
    {
        return $this->hasMany('App\dgmodel\AddAddressModel', 'user_id', 'id');
    }
    public function custmer_remarks()
    {
        return $this->hasMany('App\dgmodel\CustomerRemarkModel', 'customer_id', 'id');
    }
    public function feedback()
    {
        return $this->hasMany('App\dgmodel\Feedback', 'user_id', 'id');
    }
    
}
