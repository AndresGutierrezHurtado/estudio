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
        return $this->belongsToMany(Play::class, 'play_teams', 'team_id', 'play_id')
            ->withPivot('team_goals', 'team_local');
    }

    public function stats(): array
    {
        $stats = [
            'win' => 0,
            'lost' => 0,
            'drawn' => 0,
            'goals_for' => 0,
            'goals_against' => 0,
        ];

        $plays = $this->plays;

        foreach ($plays as $play) {
            $current = $play->teams()->where('play_teams.team_id', $this->team_id)->first();
            $other =  $play->teams()->where('play_teams.team_id', '!=', $this->team_id)->first();

            $stats['goals_for'] += $current->pivot->team_goals;
            $stats['goals_against'] += $other->pivot->team_goals;
            if ($current->pivot->team_goals === $other->pivot->team_goals) {
                $stats['drawn'] += 1;
            } else if ($current->pivot->team_goals > $other->pivot->team_goals) {
                $stats['win'] += 1;
            } else {
                $stats['lost'] += 1;
            }
        }

        return $stats;
    }
}
