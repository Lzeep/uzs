<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Violation extends Model
{

    protected $fillable = ['id', 'name'];
    public function subject()
    {
        return $this->hasMany('App\Subject');
    }
}
