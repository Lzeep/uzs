<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tobject extends Model
{
    protected $fillable = ['object_id', 'nameOfObject', 'ownerName', 'statusOfLand', 'statusOfObject',
        'violation_id', 'resultOfmeasure', 'documents', 'employeeId', 'latitude', 'longitude', 'Date_edit'];
    public function object()
    {
        return $this->belongsTo('App\Obekt');
    }
    public function land()
    {
        return $this->belongsTo('App\StatLand', 'statusOfLand');
    }
    public function stat_object()
    {
        return $this->belongsTo('App\StatObject', 'statusOfObject');
    }
    public function violation()
    {
        return $this->belongsTo('App\Violation');
    }
    public function employee()
    {
        return $this->belongsTo('App\Employee', 'employeeId');
    }
}
