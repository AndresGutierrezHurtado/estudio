<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Country extends Model
{
    protected $primaryKey = 'country_id';

    public $timestamps = false;

    protected $fillable = [
        'country_name',
        'country_code',
    ];

    public function country(): HasMany
    {
        return $this->HasMany(Medal::class, 'medal_id', 'medal_id');
    }
}
