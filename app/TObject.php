<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TObject extends Model
{
    public function object()
    {
        return $this->belongsTo('App\Objecct');
    }
    public function land()
    {
        return $this->belongsTo('App\StatLand');
    }
    public function stat_object()
    {
        return $this->belongsTo('App\StatObject');
    }
    public function violation()
    {
        return $this->belongsTo('App\Violation');
    }
    public function employee()
    {
        return $this->belongsTo('App\Employee');
    }
}
