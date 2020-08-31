<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Sport;
use App\Models\Event;
use App\Models\Team;
use App\Models\EventUser;
use App\User;
use Illuminate\Http\Request;

class SportController extends Controller
{
    public function index(Team $team, User $user, Event $event, EventUser $eventUser)
    {
        $sports = Sport::all();
        if(Auth::user() != null && auth()->user()->area != null){
            $user_area = auth()->user()->area;
            $teams = $team->where('area', $user_area)->get();
        } else{
            $teams = $team->where('area', '東京都')->get();
        }
        $events = $event->where('public', 1)->orderBy('created_at', 'desc')->limit(10)->get();
        foreach($events as $event){
            $participant[] = count($eventUser->where('event_id', $event->id)->get());
            $event_genre[] = Sport::find($event->sport_id)->sport;
        }
        return view('top', compact('sports', 'teams', 'events', 'event_genre', 'participant'));
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
