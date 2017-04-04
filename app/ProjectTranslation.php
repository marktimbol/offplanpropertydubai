<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectTranslation extends Model
{
    protected $fillable = ['project_id', 'locale', 'name', 'title', 'price', 'expected_completion_date', 'description'];
}
