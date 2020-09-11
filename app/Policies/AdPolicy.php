<?php

namespace App\Policies;

use App\User;
use App\Ad;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdPolicy
{
    use HandlesAuthorization;

    /**
     * Determine if the user may edit a Ad.
     *
     * @param  User    $user
     * @param  Ad $ad
     * @return bool
     */
    public function edit(User $user, Ad $ad)
    {
        return $user->is($ad->creator);
    }

    /**
     * Determine if the user may delete a Ad.
     *
     * @param  User    $user
     * @param  Ad $ad
     * @return bool
     */
    public function delete(User $user, Ad $ad)
    {
        return $user->is($ad->creator);
    }
}
