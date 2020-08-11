<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Sport;
use App\Models\Event;
use App\Models\Team;
use App\Models\EventUser;
use App\Models\TeamUser;
use App\User;
use Illuminate\Http\Request;

class SportController extends Controller
{
    public function index(Team $team, User $user, Event $event)
    {
        $sports = Sport::all();
        $user_area = auth()->user()->area;
        $teams = $team->where('area', $user_area)->get();
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

    public function eventGenre($id)
    {
        $sport = Sport::find($id);
        $events = $sport->events;
        return view('event_genre', compact('sport', 'events'));
    }

    public function eventDetail($id, User $user, EventUser $eventUser)
    {
        $event = Event::find($id);
        $sport_id = $event->sport_id;
        $sport_img = Sport::find($sport_id)->imagepath;
        $team_id = $event->team_id;
        $team = Team::find($team_id);
        $users = $event->users;
        $event_user = EventUser::all();
        $event_user_id = $event_user->where('event_id', $id)->where('user_id', Auth::id())->first();
        return view('event_detail', compact('event', 'team', 'users', 'sport_img', 'event_user_id'));
    }

    public function teamDetail($id)
    {
        $team = Team::find($id);
        $users = $team->users;
        $team_user = TeamUser::all();
        $team_user_id = $team_user->where('team_id', $id)->where('user_id', Auth::id())->first();
        return view('team_detail', compact('team', 'users', 'team_user_id'));
    }

    public function userDetail($id)
    {
        $user = User::find($id);
        $teams = $user->teams;
        $events = $user->events;
        return view('user_detail', compact('user', 'teams', 'events'));
    }

    public function eventIndex()
    {
        $events = Event::all();
        foreach($events as $event){
            $event_genre[] = Sport::find($event->sport_id)->sport;
        }
        return view('event_index', compact('events', 'event_genre'));
    }

    public function teamIndex(Team $team)
    {
        $teams = Team::all();
        foreach($teams as $key => $team){
            $sports[] = $team->sports;
        }
        return view('team_index', compact('teams'));
    }

    public function mypage($id)
    {
        $user = User::find($id);
        $teams = $user->teams;
        $events = $user->events;
        return view('mypage', compact('user', 'teams', 'events'));
    }

    public function joinEvent(Request $request, EventUser $eventUser)
    {
        $user_id = Auth::id();
        $event_id = $request->event_id;
        $eventUser->joinEvent($event_id, $user_id);
        return back();
    }

    public function cancelEvent($id, EventUser $eventUser)
    {
        $eventUser->cancelEvent($id);
        return back();
    }

    public function joinTeam(Request $request, TeamUser $teamUser)
    {
        $user_id = Auth::id();
        $team_id = $request->team_id;
        $teamUser->joinTeam($team_id, $user_id);
        return back();
    }

    public function cancelTeam($id, TeamUser $teamUser){
        $teamUser->cancelTeam($id);
        return back();
    }
}
