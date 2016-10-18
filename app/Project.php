<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['developer_id', 'name', 'slug', 'description'];
    
    protected $with = ['photos'];

    public function getRouteKeyName() {
    	return 'slug';
    }

    public function setNameAttribute($name)
    {
    	$this->attributes['name'] = $name;
    	$this->attributes['slug'] = str_slug($name);
    }

    public function developer()
    {
    	return $this->belongsTo(Developer::class);
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }
}
