<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','mobile','whatsapp_mobile'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
    public function remarks()
    {
        return $this->hasMany('App\dgmodel\User', 'user_id', 'id');
    }
    public function custmer_remarks()
    {
        return $this->hasMany('App\dgmodel\CustomerRemarkModel', 'user_id', 'id');
    }
    public function guest_customer_remarks()
    {
        return $this->hasMany('App\dgmodel\GuestCustomerRemark', 'user_id', 'id');
    }
}
