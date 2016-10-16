<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['developer_id', 'name', 'slug', 'description'];

    public function getRouteKeyName() {
    	return 'slug';
    }
}
