<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SportTeam extends Model
{
    protected $table = 'sport_team';

    public function createTeam($team_id, $sport_id){
        $this->team_id = $team_id;
        $this->sport_id = $sport_id;
        $this->save();
        return;
    }

    public function updateTeam($team_id, $sport_id){
        $id = $this->where('team_id', $team_id)->first('id')->id;
        $sportTeam = SportTeam::find($id);
        $sportTeam->team_id = $team_id;
        $sportTeam->sport_id = $sport_id;
        $sportTeam->save();
        return;
    }
}
