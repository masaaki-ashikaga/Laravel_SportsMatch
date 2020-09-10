<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function events(){
        return $this->belongsToMany('App\Models\Event')->withPivot('owner_user');
    }

    public function teams(){
        return $this->belongsToMany('App\Models\Team')->withPivot('owner_user');
    }

    public function sports(){
        return $this->belongsToMany('App\Models\Sport');
    }

    public function profileUpdate($request)
    {
        $id = $request->id;
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->area = $request->area;
        $user->profile = $request->profile;
        if($request->imagepath){
            $user->imagepath = $request->imagepath;
        }
        $user->save();
        return;
    }
}
