<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    public function sports(){
        return $this->belongsToMany('App\Models\Sport');
    }

    public function events(){
        return $this->hasMany('App\Models\Event');
    }

    public function users(){
        return $this->belongsToMany('App\User')->withPivot('owner_user');
    }
}
