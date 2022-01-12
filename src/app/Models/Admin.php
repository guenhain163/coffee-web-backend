<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    const STATUS_ACTIVE = 1;
    const STATUS_BLOCKED = 0;

    protected $guard = 'admin';

    protected $fillable = [
        'username',
        'password',
    ];

    protected $hidden = [
        'password'
    ];

}
