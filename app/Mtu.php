<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mtu extends Model
{
    protected $fillable = ['id', 'name', 'district_id'];
    public function subject()
    {
        return $this->hasMany('App\Subject');
    }
    public function district()
    {
        return $this->belongsTo('App\District');
    }

}
