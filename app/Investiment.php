<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Investiment extends Model
{
    public $timestamps = false;

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function city()
    {
        return $this->belongsTo('App\City');
    }
}
