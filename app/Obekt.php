<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Obekt extends Model
{
    public function TObject()
    {
        return $this->hasMany('App\TObject');
    }
}
