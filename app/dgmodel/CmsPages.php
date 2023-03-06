<?php

namespace App\dgmodel;

use Illuminate\Database\Eloquent\Model;

class CmsPages extends Model
{
    protected $table = 'cms_pages';
    public $timestamps = false;
    protected $guarded = ['id'];
}
