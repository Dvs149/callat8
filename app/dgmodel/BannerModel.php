<?php

namespace App\dgmodel;

use Illuminate\Database\Eloquent\Model;

class BannerModel extends Model
{
    protected $table = 'banner';
    public $timestamps = false;
    protected $guarded = [];
    protected $appends = ['banner_image_url'];

    public function getBannerImageUrlAttribute() {
        return url(config('custom.BANNER_IMAGE_PATH').$this->attributes['bnr_image']);
    }

}
