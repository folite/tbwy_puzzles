<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class topic extends Model
{
    protected $table = 'topics';
    protected $hidden = ['leven', 'created_at', 'updated_at'];
}
