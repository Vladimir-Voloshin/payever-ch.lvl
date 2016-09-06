<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\User;
use App\Album;

class AlbumPolicy
{
    use HandlesAuthorization;

    /**
     * Determine if the given user can delete the given album.
     *
     * @param  User  $user
     * @param  Album  $album
     * @return bool
     */
    public function delete(User $user, Album $album)
    {
        return $user->id === $album->user_id;
    }
}
