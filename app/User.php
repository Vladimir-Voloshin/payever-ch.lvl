<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    const USER         = 10;
    const SUPERVISOR   = 80;
    const ADMIN        = 90;
    const SUPERADMIN   = 99;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get all of the user's albums.
     */
    public function albums()
    {
        return $this->hasMany(Album::class);
    }
}
