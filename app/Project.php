<?php

namespace App;

use Laravel\Scout\Searchable;
use Dimsav\Translatable\Translatable;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use Translatable;
    // use Searchable, Translatable;

    protected $fillable = [
        'slug', 'latitude', 'longitude', 'dld_project_completion_link', 'project_escrow_account_details_link'
    ];

    // protected $fillable = [
    //     'name', 'title', 'price', 'latitude', 'longitude', 'expected_completion_date',
    //     'dld_project_completion_link', 'project_escrow_account_details_link', 'description'
    // ];    

    public $translatedAttributes = ['name', 'title', 'price', 'expected_completion_date', 'description'];
    
    public function getRouteKeyName() {
    	return 'slug';
    }

    public function setNameAttribute($name)
    {
        dd($name);
    	// $this->attributes['name'] = $name;
    	// $this->attributes['slug'] = str_slug($name);
    }

    public static function boot()
    {
        parent::boot();

        static::saved(function($project) {
            Cache::forget('projects');
            Cache::forget('home_projects');
            Cache::forget('filters');
            Cache::forget('communities');
        });

        static::updated(function($project) {
            Cache::forget('projects');
            Cache::forget('home_projects');
            Cache::forget('filters');
            Cache::forget('communities');                
            Cache::forget(sprintf('%s-page', $project->slug));        
        });

        static::deleted(function($project) {
            Cache::forget('projects');
            Cache::forget('home_projects');
            Cache::forget('filters');
            Cache::forget('communities');
        });        
    }

    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function toSearchableArray()
    {
        $array = $this->toArray();

        $array = [
            'id'    => $this->id,
            'name'  => $this->name,
            'title' => $this->title,
            'updated_at'    => $this->updated_at,
            'communities'   => $this['communities'],
            'developer' => $this['developer']['name']
        ];

        return $array;
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

    public function videos()
    {
        return $this->hasMany(Video::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function types()
    {
        return $this->belongsToMany(Type::class, 'project_types');
    }

    public function communities()
    {
        return $this->belongsToMany(Community::class, 'community_projects', 'project_id', 'community_id');
    }
}
