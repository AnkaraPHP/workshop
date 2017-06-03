<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public function projects() {
        return $this->hasMany('App\Customer');
    }

    public function team() {
        return $this->belongsTo('App\Team');
    }
}
