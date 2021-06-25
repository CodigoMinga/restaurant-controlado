<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tabletype extends Model
{
    public function tables()
    {
        return $this->hasMany('App\Table');
    }
}
