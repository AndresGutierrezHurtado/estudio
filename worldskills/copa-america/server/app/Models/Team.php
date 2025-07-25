<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Team extends Model
{
    protected $primaryKey = 'team_id';

    public $timestamps = false;

    public $fillable = [
        'team_name',
        'team_code',
        'team_image',
    ];

    public function plays(): BelongsToMany
    {
        return $this->belongsToMany(Play::class, 'play_teams', 'team_id', 'play_id');
    }

    public function stats()
    {
        $stats = [
            'wins' => 0,
            'draws' => 0,
            'losses' => 0,
            'goals_for' => 0,
            'goals_against' => 0,
        ];

        $plays = $this->plays;
        foreach ($plays as $play) {
            $opponent = $play->playTeams()->where('team_id', '!=', $this->team_id)->first();
            $currentTeam = $play->playTeams()->where('team_id', $this->team_id)->first();

            $stats['goals_for'] += $currentTeam->team_goals;
            $stats['goals_against'] += $opponent->team_goals;

            if ($currentTeam->team_goals > $opponent->team_goals) {
                $stats['wins']++;
            } elseif ($currentTeam->team_goals == $opponent->team_goals) {
                $stats['draws']++;
            } else {
                $stats['losses']++;
            }
        }

        return $stats;
    }
}
