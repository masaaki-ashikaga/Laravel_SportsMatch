<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
}
