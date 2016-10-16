<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Developer extends Model
{
    protected $fillable = ['name'];

    protected $with = ['projects'];
    
    public function projects()
    {
    	return $this->hasMany(Project::class);
    }
}
