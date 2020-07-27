<?php

namespace App\Http\Controllers;

use App\Models\Sport;
use App\Models\Event;
use Illuminate\Http\Request;

class SportController extends Controller
{
    public function index()
    {
        $sports = Sport::all();
        return view('top', compact('sports'));
    }

    public function genre()
    {
        $sports = Sport::all();
        return view('sport_genre', compact('sports'));
    }

    public function eventGenre($id)
    {
        $sport = Sport::find($id);
        $events = $sport->events;
        return view('event_genre', compact('sport', 'events'));
    }

    public function eventDetail($id)
    {
        $event = Event::find($id);
        return view('event_detail', compact('event'));
    }
}
