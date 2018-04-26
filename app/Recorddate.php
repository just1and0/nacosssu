<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recorddate extends Model
{
    //
    public function filled()
    {
    	return $this->hasMany(Filled::class);
    }
}
