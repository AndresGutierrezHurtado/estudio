<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Call extends Model
{
    public $primaryKey = 'administrative_id';

    public $timestamps = true;

    protected $fillable = [
        'call_name',
        'call_description',
        'call_money',
        'call_type',
        'call_places',
        'call_start',
        'call_end',
    ];

    public function postulations(): HasMany
    {
        return $this->HasMany(Postulation::class, 'call_id');
    }
}
