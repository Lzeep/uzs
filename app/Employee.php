<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
//    public function tObject()
//    {
//        return $this->hasMany('App\TObject');
//    }
    protected $fillable = ['id', 'Full_name', 'Address', 'Phone', 'district_id'];

    public function district()
    {
        return $this->belongsTo('App\District');
    }
}
