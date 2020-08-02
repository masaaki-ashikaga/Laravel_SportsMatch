<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $guarded = [
        'id'
    ];

    public function sport(){
        return $this->belongsTo('App\Models\Sport');
    }
}
