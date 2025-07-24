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
}
