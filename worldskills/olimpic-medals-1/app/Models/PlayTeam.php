<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlayTeam extends Model
{
    public $timestamps = false;

    public $fillable = [
        'play_id',
        'team_id',
        'team_goals',
        'team_local',
    ];
}
