<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Competitor extends Model
{
    protected $primaryKey = 'competitor_id';

    public $timestamps = false;

    public $fillable = [
        'competitor_name',
        'competitor_lastname',
        'competitor_description',
        'competitor_birthdate',
        'country_id',
    ];

    public function medals(): BelongsToMany
    {
        return $this->belongsToMany(Medal::class, 'medal_competitors', 'competitor_id', 'medal_id');
    }
}
