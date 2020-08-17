<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\EventUser;

class Event extends Model
{
    protected $guarded = [
        'id'
    ];

    public function sport(){
        return $this->belongsTo('App\Models\Sport');
    }

    public function users(){
        return $this->belongsToMany('App\User')->withPivot('owner_user');
    }

    public function teams(){
        return $this->belongsTo('App\Models\Team');
    }

    public function createEvent($request){
        $event = new Event;
        $new_event = $request->only([
            'title', 'comment', 'venue', 'address','event_start_date', 'event_start_time', 'event_end_date', 'event_end_time', 'capacity', 'payment', 'apply_end_date', 'apply_end_time', 'event_imagepath', 'sport_id', 'team_id'
            ]);
        $event->fill($new_event)->save();
        $event_id = $event->id;
        return $event_id;
    }

    public function updateEvent($id, $request){
        $event = Event::find($id);
        $update_event = $request->only([
            'title', 'comment', 'venue', 'address','event_start_date', 'event_start_time', 'event_end_date', 'event_end_time', 'capacity', 'payment', 'apply_end_date', 'apply_end_time', 'event_imagepath', 'sport_id', 'team_id'
        ]);
        $event->fill($update_event)->update();
        return;
    }

    public function eventDestroy($id)
    {
        return $this->where('id', $id)->delete();
    }
}
