<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
//    public function tObject()
//    {
//        return $this->hasMany('App\TObject');
//    }

    public function position()
    {
        return $this->belongsTo('App\Position');
    }


    public function district()
    {
        return $this->belongsTo('App\District');
    }
}
