<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
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

    public function cancelEvent($id)
    {
        return $this->where('id', $id)->delete();
    }

    public function createEvent($event_id)
    {
        $user_id = Auth::user()->id;
        $this->event_id = $event_id;
        $this->user_id = $user_id;
        $this->owner_user = true;
        $this->save();
        return;
    }
}
