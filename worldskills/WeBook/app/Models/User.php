<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    public $primaryKey = 'user_id';

    public $timestamps = true;

    protected $fillable = [
        'user_name',
        'user_email',
        'user_password',
    ];
}
