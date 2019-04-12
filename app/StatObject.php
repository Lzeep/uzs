<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatObject extends Model
{
    protected $guarded = [];

    public function TObject()
    {
        return $this->hasMany('App\TObject');
    }
}
