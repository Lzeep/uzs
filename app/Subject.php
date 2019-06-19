<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = ['district_id', 'mtu_id', 'type_id','address', 'name', 'owner', 'status_id', 'violation_id', 'result_id',
        'document', 'employee_id', 'latitude', 'longitude', 'fucntionDoc', 'logo', 'sDoc', 'sSub', 'sReal', 'dateRent', 'delPoint', 'deleter'];
    public function images()
    {
        return $this->belongsToMany('App\Image');
    }

    public function status()
    {
        return $this->belongsTo('App\Land');
    }

    public function violation()
    {
        return $this->belongsTo('App\Violation', 'violation_id');
    }

    public function result()
    {
        return $this->belongsTo('App\Result', 'result_id');
    }

    public function  employee()
    {
        return $this->belongsTo('App\User', 'employee_id');
    }

    public function mtu()
    {
        return $this->belongsTo('App\Mtu', 'mtu_id');
    }
    public function type()
    {
        return $this->belongsTo('App\Type', 'type_id');
    }
    public function func()
    {
        return $this->belongsTo('App\Type', 'fucntionDoc');
    }

    public function district()
    {
        return $this->belongsTo('App\District', 'district_id');
    }

}
