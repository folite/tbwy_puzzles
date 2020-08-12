<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class way extends Model
{
    protected $table = 'ways';
    protected $hidden = ['created_at', 'updated_at'];
}
