<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Event;
use App\Models\EventUser;
use App\Models\Sport;
use App\Models\Team;
use App\Models\TeamUser;
use App\Models\SportTeam;

use App\User;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Team $team)
    {
        $teams = Team::with('sports')->get();
        $sports = Sport::all();
        return view('teams.team_index', compact('teams', 'sports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sports = Sport::all();
        return view('teams.team_create', compact('sports'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Team $team, TeamUser $teamUser, SportTeam $sportTeam)
    {
        $sport_id = $request->sport_id;
        $team_id = $team->createTeam($request);
        $teamUser->createTeam($team_id);
        $sportTeam->createTeam($team_id, $sport_id);
        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $team = Team::find($id);
        $users = $team->users;
        $owner_user = TeamUser::where('team_id', $id)->where('owner_user', 1)->first();
        $team_user_id = TeamUser::where('team_id', $id)->where('user_id', Auth::id())->first();
        return view('teams.team_detail', compact('team', 'users', 'owner_user', 'team_user_id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, SportTeam $sportTeam)
    {
        $team = Team::find($id);
        $sport_team_id = $sportTeam->where('team_id', $id)->first()->id;
        $sport_team = SportTeam::find($sport_team_id);
        $sports = Sport::all();
        return view('teams.team_edit', compact('team', 'sports', 'sport_team'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team, SportTeam $sportTeam)
    {
        $sport_id = $request->sport_id;
        $team_id = $request->id;
        $team->teamUpdate($team_id, $request);
        $sportTeam->updateTeam($team_id, $sport_id);
        return redirect()->route('teamManage');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Team::find($request->id)->delete();
        return redirect()->route('teamManage');
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

    public function teamManage(TeamUser $teamUser){
        $user_id = Auth::user()->id;
        $teams = $teamUser->ownerTeams($user_id);
        return view('teams.team_manage', compact('teams'));
    }

    public function findTeam(Request $request, Team $team)
    {
        $teams_id = SportTeam::where('sport_id', $request->genre)->get('team_id');
        if(!$teams_id->isEmpty()){
            foreach($teams_id as $team_id){
                $teams[] = Team::find($team_id);
            }
        } else{
            $teams = null;
        }
        return view('teams.team_find', compact('teams'));
    }
}
