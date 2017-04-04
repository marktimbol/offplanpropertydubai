<?php

namespace App;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	use Translatable;

    protected $fillable = ['name'];
    public $translatedAttributes = ['description'];
    
    protected $with = ['types'];
    
    public function types()
    {
    	return $this->hasMany(Type::class);
    }
}
