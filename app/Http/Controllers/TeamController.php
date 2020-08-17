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

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Team $team)
    {
        $teams = Team::all();
        foreach($teams as $key => $team){
            $sports[] = $team->sports;
        }
        return view('teams.team_index', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teams.team_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Team $team, TeamUser $teamUser)
    {
        $team_id = $team->createTeam($request);
        $teamUser->createTeam($team_id);
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
        $team_user = TeamUser::all();
        $team_user_id = $team_user->where('team_id', $id)->where('user_id', Auth::id())->first();
        return view('teams.team_detail', compact('team', 'users', 'team_user_id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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

    public function teamManage(){
        return view('teams.team_manage');
    }
}
