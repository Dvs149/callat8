<?php

namespace App\dgmodel;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    protected $table = 'driver';
    public $timestamps = false;
    protected $guarded = [];
    protected $hidden = array('avgRating');

    protected $appends = ['aadhar_card_photo_url', 'license_photo_url', 'passport_photo_url', 'driver_avg_rating'];

    public function doubleGoogleOrder()
    {
        return $this->hasMany('App\DoubleGoogleOrderModel', 'driver_id', 'id');
    }

    public function getAadharCardPhotoUrlAttribute()
    {
        return url(config('custom.AADHAR_CARD_PATH') . $this->attributes['aadhar_card_photo']);
    }

    public function getLicensePhotoUrlAttribute()
    {
        return url(config('custom.LICENSE_PATH') . $this->attributes['license_photo']);
    }

    public function getPassportPhotoUrlAttribute()
    {
        return url(config('custom.PASSPORT_PATH') . $this->attributes['passport_photo']);
    }
        
    public function getDriverAvgRatingAttribute()
    {
        if (!array_key_exists('avgRating', $this->relations)) {
            $this->load('avgRating');
        }

        $relation = $this->getRelation('avgRating')->first();
        return ($relation) ? number_format((float)$relation->aggregate, 1, '.', '') : null;
        // return $this->feedback();
    }

    public function avgRating()
    {
        return $this->feedback()
            ->selectRaw('avg(rate) as aggregate, driver_id')
            ->where('status', 'Y')
            ->groupBy('driver_id');
    }

    public function driverLocation()
    {
        return $this->hasMany('App\dgmodel\DriverLocation', 'driver_id', 'id');
    }
    public function feedback()
    {
        return $this->hasMany('App\dgmodel\Feedback', 'driver_id', 'id');
    }
    

}
