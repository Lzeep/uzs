<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = ['address', 'name', 'image_id', 'owner', 'status_id', 'violation_id', 'result_id',
        'document', 'employee_id', 'latitude', 'longitude'];
    public function image()
    {
        return $this->belongsTo('App\Image', 'image_id');
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
        return $this->belongsTo('App\Employee', 'employee_id');
    }
}
