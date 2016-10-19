<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Developer extends Model
{
    // use Searchable;

    protected $fillable = ['name', 'slug', 'country', 'website', 'profile', 'photo'];

    protected $with = ['projects'];
    
    public function getRouteKeyName() {
    	return 'slug';
    }

    public function setNameAttribute($name)
    {
    	$this->attributes['name'] = $name;
    	$this->attributes['slug'] = str_slug($name);
    }
    
    /**
     * Get the index name for the model.
     *
     * @return string
     */
    public function searchableAs()
    {
        return 'offplan_developers';
    }

    public function projects()
    {
    	return $this->hasMany(Project::class);
    }
}
