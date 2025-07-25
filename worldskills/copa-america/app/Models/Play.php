<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Play extends Model
{
    protected $primaryKey = 'play_id';

    public $timestamps = false;

    public $fillable = [
        'play_date',
        'play_start',
    ];

    
    public function teams(): BelongsToMany
    {
        return $this->belongsToMany(Team::class, 'play_teams', 'play_id', 'team_id');
    }

    public function playTeams(): HasMany
    {
        return $this->hasMany(PlayTeam::class, 'play_id', 'play_id');
    }
}
