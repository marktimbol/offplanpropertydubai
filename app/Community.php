<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Community extends Model
{
    protected $fillable = ['name', 'slug', 'description'];

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
        return $this->belongsToMany(Project::class, 'community_projects', 'community_id', 'project_id');
        // return $this->belongsToMany(Project::class, 'community_projects');
    } 
}
