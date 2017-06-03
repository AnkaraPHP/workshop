<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    public function project() {
        return $this->belongsTo('App\Project');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function team() {
        return $this->belongsTo('App\Team');
    }
}
