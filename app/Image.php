<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected  $fillable = ['image'];

    public function subject()
    {
        return $this->belongsToMany('App\Subject');
    }
}
