<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Sport;
use App\Models\Event;
use App\Models\Team;
use App\User;
use Illuminate\Http\Request;

class SportController extends Controller
{
    public function index(Team $team, User $user, Event $event)
    {
        $sports = Sport::all();
        if(Auth::user() != null){
            $user_area = auth()->user()->area;
            $teams = $team->where('area', $user_area)->get();
        } else{
            $teams = $team->where('area', '東京都')->get();
        }
        $events = $event->orderBy('created_at', 'asc')->limit(10)->get();
        foreach($events as $event){
            $event_genre[] = Sport::find($event->sport_id)->sport;
        }
        return view('top', compact('sports', 'teams', 'events', 'event_genre'));
    }

    public function genre()
    {
        $sports = Sport::all();
        return view('sport_genre', compact('sports'));
    }

    public function userDetail($id)
    {
        $user = User::find($id);
        $teams = $user->teams;
        $events = $user->events;
        return view('user_detail', compact('user', 'teams', 'events'));
    }

    public function mypage($id)
    {
        $user = User::find($id);
        $teams = $user->teams;
        $events = $user->events;
        return view('mypage', compact('user', 'teams', 'events'));
    }
}
