<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectType extends Model
{
    protected $fillable = ['name'];

    public function subcategories()
    {
    	return $this->hasMany(SubCategory::class);
    }
}
