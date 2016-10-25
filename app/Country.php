<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = ['name', 'slug'];
    protected $with = ['cities'];
    
    public function setNameAttribute($name)
    {
    	$this->attributes['name'] = $name;
    	$this->attributes['slug'] = str_slug($name);
    }

    public function cities()
    {
    	return $this->hasMany(City::class);
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
