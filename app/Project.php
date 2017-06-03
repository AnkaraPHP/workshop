<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function customer() {
        return $this->belongsTo('App\Customer');
    }

    public function team() {
        return $this->belongsTo('App\Team');
    }
}
