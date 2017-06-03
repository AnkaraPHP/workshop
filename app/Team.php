<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    public function users()
    {
        return $this->hasMany('App\User');
    }

    public function customers() {
        return $this->hasMany('App\Customer');
    }

    public function files() {
        return $this->hasMany('App\File');
    }

    public function passwords() {
        return $this->hasMany('App\Password');
    }

    public function projects() {
        return $this->hasMany('App\Project');
    }
}
