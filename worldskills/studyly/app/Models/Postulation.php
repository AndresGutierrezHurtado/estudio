<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Postulation extends Model
{
    public $primaryKey = 'administrative_id';

    public $timestamps = true;

    protected $fillable = [
        'student_id',
        'call_id',
    ];

    public function call(): BelongsTo
    {
        return $this->BelongsTo(Call::class, 'call_id', 'call_id');
    }

    public function student(): BelongsTo
    {
        return $this->BelongsTo(Student::class, 'student_id', 'student_id');
    }
}
