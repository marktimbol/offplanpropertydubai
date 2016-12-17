<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Slide extends Model
{
    protected $fillable = ['path'];

    public static function boot()
    {
        parent::boot();

        static::saved(function($slide) {
            Cache::forget('home_slides');
        });

        static::deleted(function($slide) {
            Cache::forget('home_slides');
        });        
    }    
}
