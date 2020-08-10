<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventUser extends Model
{
    protected $table = 'event_user';

    public function joinEvent($event_id, $user_id)
    {
        $this->event_id = $event_id;
        $this->user_id = $user_id;
        $this->save();
        return;
    }
}
