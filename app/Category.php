<?php

namespace App;

use App\Keyword;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = false;

    public function keywords()
    {
        return $this->hasMany('Keyword');
    }
}
