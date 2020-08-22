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

    public function ownerEvents($events_id)
    {
        // $events_id = $this->where('user_id', $user_id)->where('owner_user', 1)->select('event_id')->get();
        foreach($events_id as $event_id){
            $events[] = Event::find($event_id);
        }
        return $events;
    }
}
