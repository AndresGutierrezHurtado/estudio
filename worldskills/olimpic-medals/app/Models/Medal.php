<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Medal extends Model
{
    protected $primaryKey = 'medal_id';

    public $timestamps = false;

    protected $fillable = [
        'medal_type',
        'medal_year',
        'medal_sport',
        'country_id'
    ];

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class, 'country_id', 'country_id');
    }
}
