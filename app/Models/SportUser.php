<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class SportUser extends Model
{
    protected $table = 'sport_user';

    public function favoriteSport($sports, $request)
    {
        $favoriteSport = $this->where('user_id', Auth::id())->first();
        foreach($sports as $sport){
            if($sport != null){
                $item = implode(',', $sport);
            } else{
                $item = null;
            }
        }
        if($favoriteSport === null){
            $sportUser = new SportUser;
        } else{
            $id = $favoriteSport->id;
            $sportUser = $this::find($id);
        }
        $sportUser->sport_id = $item;
        $sportUser->user_id = $request->id;
        $sportUser->save();
        return;
    }
}
