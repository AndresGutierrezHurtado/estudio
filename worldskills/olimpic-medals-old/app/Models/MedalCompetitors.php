<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MedalCompetitors extends Model
{
    protected $primaryKey = ['medal_id', 'competitor_id'];

    public $timestamps = false;

    protected $fillable = ['medal_id', 'competitor_id'];

    public function medal(): BelongsTo
    {
        return $this->belongsTo(Medal::class, 'medal_id', 'medal_id');
    }

    public function competitor(): BelongsTo
    {
        return $this->belongsTo(Competitor::class, 'competitor_id', 'competitor_id');
    }
}
