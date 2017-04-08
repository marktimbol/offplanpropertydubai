<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeveloperTranslation extends Model
{
    protected $fillable = ['developer_id', 'locale', 'name', 'profile'];
}
