<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    public static function chief($id)
    {
        $team = Team::findOrFail($id);
        $c = ChiefTeam::where('team_id',$team->id);
        return $c->count() > 0 ? \App\Models\User::find($c->first()->user_id)->name : '';
    }
}
