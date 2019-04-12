<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Objecct extends Model
{
    public function TObject()
    {
        return $this->hasMany('App\YObject');
    }
}
