<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $guarded = [
        'id'
    ];

    public function sports(){
        return $this->belongsToMany('App\Models\Sport');
    }

    public function events(){
        return $this->hasMany('App\Models\Event');
    }

    public function users(){
        return $this->belongsToMany('App\User')->withPivot('owner_user');
    }

    public function createTeam($request){
        $team = new Team;
        $new_team = $request->only(['name', 'detail', 'area', 'main_imgpath', 'sub_imgpath']);
        $team->fill($new_team)->save();
        $team_id = $team->id;
        return $team_id;
    }

    public function teamUpdate($team_id, $request){
        $team = Team::find($team_id);
        $update_team = $request->only(['name', 'detail', 'area', 'main_imgpath', 'sub_imgpath']);
        $team->fill($update_team)->update();
        return;
    }
}
