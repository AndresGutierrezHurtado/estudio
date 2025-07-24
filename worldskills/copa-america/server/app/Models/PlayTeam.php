<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlayTeams extends Model
{
    public $timestamps = false;

    public $fillable = [
        'team_id',
        'play_id',
        'team_goals',
        'team_local',
    ];
}
