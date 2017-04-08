<?php

namespace App;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Developer extends Model
{
    // use Translatable;

    public $translatedAttributes = ['name', 'profile'];
    
    protected $fillable = ['country_id', 'slug', 'website', 'photo'];
    
    public function getRouteKeyName() {
    	return 'slug';
    }

    // public function setNameAttribute($name)
    // {
    // 	$this->attributes['name'] = $name;
    // 	$this->attributes['slug'] = str_slug($name);
    // }

    public function projects()
    {
    	return $this->hasMany(Project::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
