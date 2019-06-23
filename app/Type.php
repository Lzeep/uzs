<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $fillable = ['id', 'name'];
    public function subject()
    {
        return $this->hasMany('App\Subject');
    }
}
