<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = ['name', 'slug'];
    protected $with = ['communities'];
    
    public function setNameAttribute($name)
    {
    	$this->attributes['name'] = $name;
    	$this->attributes['slug'] = str_slug($name);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function communities()
    {
    	return $this->hasMany(Community::class);
    }

}
