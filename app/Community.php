<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Community extends Model
{
    protected $fillable = ['name', 'slug'];

    public function setNameAttribute($name)
    {
    	$this->attributes['name'] = $name;
    	$this->attributes['slug'] = str_slug($name);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
    
    public function projects()
    {
    	return $this->hasMany(Project::class);
    }
}
