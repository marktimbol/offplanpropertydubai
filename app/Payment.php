<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['title', 'percentage', 'date'];

    protected $table = 'payments';
}
