<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    public function subject()
    {
        return $this->hasMany('App\Subject');
    }
}
