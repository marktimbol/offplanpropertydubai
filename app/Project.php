<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'developer_id', 
        'community_id', 
        
        'name', 
        'title', 
        'slug',

        'country',
        'city',
        'community',
        
        'latitude',
        'longitude',
        
        'expected_completion_date',
        
        'dld_project_completion_link',
        'project_escrow_account_details_link',
        
        'description'
    ];
    
    protected $with = ['logo', 'photos', 'floorplans', 'brochure', 'video', 'payments', 'types'];

    public function getRouteKeyName() {
    	return 'slug';
    }

    public function setTitleAttribute($title)
    {
    	$this->attributes['title'] = $title;
    	$this->attributes['slug'] = str_slug($title);
    }

    public function developer()
    {
    	return $this->belongsTo(Developer::class);
    }

    public function logo()
    {
        return $this->hasOne(Logo::class);
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function floorplans()
    {
        return $this->hasMany(Floorplan::class);
    }

    public function brochure()
    {
        return $this->hasOne(Brochure::class);
    }

    public function video()
    {
        return $this->hasOne(Video::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function types()
    {
        return $this->belongsToMany(Type::class, 'project_types');
    }
}
