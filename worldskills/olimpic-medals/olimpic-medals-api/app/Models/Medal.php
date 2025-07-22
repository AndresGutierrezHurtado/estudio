<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Medal extends Model
{
    protected $primaryKey = 'medal_id';

    public $timestamps = false;

    public $fillable = [
        'medal_type',
        'medal_sport',
        'medal_year',
        'country_id',
    ];
    
    public function competitors(): BelongsToMany
    {
        return $this->belongsToMany(Competitor::class, 'medal_competitors', 'medal_id', 'competitor_id');
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class, 'country_id', 'country_id');
    }
}
