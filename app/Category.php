<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = false;

    public function investiments()
    {
        return $this->hasMany('App\Investiment');
    }

    public function keywords()
    {
        return $this->hasMany('App\Keyword');
    }
}
