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

    public function medals(): HasMany
    {
        return $this->hasMany(Medal::class, 'country_id', 'country_id');
    }
}
