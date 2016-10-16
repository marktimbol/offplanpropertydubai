<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Developer extends Model
{
    protected $fillable = ['name', 'slug'];

    protected $with = ['projects'];
    
    public function getRouteKeyName() {
    	return 'slug';
    }

    public function setNameAttribute($name)
    {
    	$this->attributes['name'] = $name;
    	$this->attributes['slug'] = str_slug($name);
    }
    
    public function projects()
    {
    	return $this->hasMany(Project::class);
    }
}
