<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatLand extends Model
{
//    public function TObject()
//    {
//        return $this->hasMany('App\TObject');
//    }

    public function subject()
    {
        return $this->hasMany('App\Subject');
    }
}
