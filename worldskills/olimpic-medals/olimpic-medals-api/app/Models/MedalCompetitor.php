<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MedalCompetitor extends Model
{
    public $timestamps = false;

    public $fillable = [
        'competitor_id',
        'medal_id',
    ];
}
