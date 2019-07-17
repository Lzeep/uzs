<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    public function subject()
    {
        return $this->hasMany('App\Subject');
    }
    public function Mtu()
    {
        return $this->hasMany('App\Subject');
    }
    public function employee()
    {
        return $this->hasMany('App\Employee');
    }
}
