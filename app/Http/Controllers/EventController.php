<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Event;
use App\Models\EventUser;
use App\Models\Sport;
use App\Models\Team;
use App\Models\TeamUser;
use App\User;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Event $event)
    {
        $events = $event->where('public', 1)->get();
        foreach($events as $event){
            $event_genre[] = Sport::find($event->sport_id)->sport;
        }
        return view('events.event_index', compact('events', 'event_genre'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(TeamUser $teamUser, Sport $sport)
    {
        $teams_id = $teamUser->where('user_id', Auth::id())->where('owner_user', 1)->get('team_id');
        foreach($teams_id as $team_id){
            $teams[] = Team::find($team_id)->pluck('name', 'id');
        }
        if(!isset($teams)){
            $teams = null;
        }
        $sports = $sport->select('id', 'sport')->get('sport');
        return view('events.event_create', compact('teams', 'sports'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Event $event, EventUser $eventUser)
    {
        $event_id = $event->createEvent($request);
        $eventUser->createEvent($event_id);
        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, User $user, EventUser $eventUser)
    {
        $event = Event::find($id);
        $sport_id = $event->sport_id;
        $sport_img = Sport::find($sport_id)->imagepath;
        $team_id = $event->team_id;
        $team = Team::find($team_id);
        $users = $event->users;
        $event_user = EventUser::all();
        $event_user_id = $event_user->where('event_id', $id)->where('user_id', Auth::id())->first();
        return view('events.event_detail', compact('event', 'team', 'users', 'sport_img', 'event_user_id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, TeamUser $teamUser, Sport $sport)
    {
        $teams_id = $teamUser->where('user_id', Auth::id())->where('owner_user', 1)->get('team_id');
        foreach($teams_id as $team_id){
            $teams[] = Team::find($team_id)->pluck('name', 'id');
        }
        $sports = $sport->select('id', 'sport')->get('sport');
        $event = Event::find($id);
        return view('events.event_edit', compact('event', 'teams', 'sports'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        $id = $request->id;
        $event->updateEvent($id, $request);
        return redirect()->route('eventManage');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Event::find($request->id)->delete();
        return redirect()->route('eventManage');
    }

    public function eventGenre($id)
    {
        $sport = Sport::find($id);
        $items = $sport->events;
        $events = $items->where('public', 1)->all();
        return view('events.event_genre', compact('sport', 'events'));
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

    public function eventManage(EventUser $eventUser)
    {
        $user_id = Auth::user()->id;
        $events_id = $eventUser->where('user_id', $user_id)->where('owner_user', 1)->select('event_id')->get();
        if($events_id->isEmpty()){
            return view('events.event_manage');
        } else{
            $events = $eventUser->ownerEvents($events_id);
            return view('events.event_manage', compact('events'));
        }
    }

    public function eventPublic($id, Event $event)
    {
        $event->publicEvent($id);
        return back();
    }
}
