<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Team extends Model
{
    use HasFactory;

    public static function chief($id)
    {
        $team = Team::findOrFail($id);
        $c = ChiefTeam::where('team_id',$team->id);
        return $c->count() > 0 ? \App\Models\User::find($c->first()->user_id)->name : '';
    }

    public static function ChiefTeam($id)
    {
        return ChiefTeam::where('user_id',$id)->count() > 0 ? User::find(ChiefTeam::where('user_id',$id)->firstOrFail()->user_id)->name : 'none';
    }

    public static function team($id)
    {
        return (TeamUser::where('user_id',$id)->count() > 0) ? Team::find(TeamUser::where('user_id',$id)->firstOrFail()->team_id)->name : 'none';
    }

    public function teamChief($id)
    {
        if(TeamUser::where('user_id',$id)->count() > 0){
            $team = TeamUser::where('user_id',$id)->firstOrFail()->team_id;
            return ChiefTeam::where('team_id',$team)->count() > 0 ? User::findOrFail(ChiefTeam::where('team_id',$team)->firstOrFail()->user_id)->name : 'no Team Leader';
        }
        else{
            return 'no team';
        }
    }



}
