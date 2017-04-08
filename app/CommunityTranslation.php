<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommunityTranslation extends Model
{
    protected $fillable = ['community_id', 'locale', 'name', 'description'];
}
