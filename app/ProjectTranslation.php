<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectTranslation extends Model
{
    protected $fillable = ['locale', 'name', 'title', 'expected_completion_date', 'description'];
}
