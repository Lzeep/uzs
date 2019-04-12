<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public function tObject()
    {
        return $this->hasMany('App\TObject');
    }

    public function Post()
    {
        return $this->belongsTo('App\Position');
    }
}
