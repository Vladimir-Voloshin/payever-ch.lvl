<?php

namespace App\Repositories;

use App\User;
use App\Album;

class AlbumRepository
{
    /**
     * Get all of the albums for a given user.
     *
     * @param  User  $user
     * @return Collection
     */
    public function forUser(User $user)
    {
        return Album::where('user_id', $user->id)
                    ->orderBy('created_at', 'asc')
                    ->get();
    }
}
