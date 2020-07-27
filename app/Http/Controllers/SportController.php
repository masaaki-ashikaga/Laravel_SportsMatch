<?php

namespace App\Http\Controllers;

use App\Models\Sport;
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

    public function eventGenre($id, Sport $sort)
    {
        $sport = Sport::find($id);
        $events = $sport->events;
        return view('event_genre', compact('sport', 'events'));
    }
}
