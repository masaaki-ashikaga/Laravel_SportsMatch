<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use App\Models\Team;

class TeamUser extends Model
{
    protected $table = 'team_user';

    public function joinTeam($team_id, $user_id)
    {
        $this->team_id = $team_id;
        $this->user_id = $user_id;
        $this->save();
        return;
    }

    public function cancelTeam($id)
    {
        return $this->where('id', $id)->delete();
    }

    public function createTeam($team_id){
        $user_id = Auth::user()->id;
        $this->team_id = $team_id;
        $this->user_id = $user_id;
        $this->owner_user = true;
        $this->save();
        return;
    }

    public function ownerTeams($user_id){
        $teams_id = $this->where('user_id', $user_id)->where('owner_user', 1)->select('team_id')->get();
        foreach($teams_id as $team_id){
            $teams[] = Team::find($team_id);
        }
        return $teams;
    }
}
