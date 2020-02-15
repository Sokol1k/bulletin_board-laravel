<?php

namespace App\Policies;

use App\Models\Bulletin;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BulletinPolicy
{
    use HandlesAuthorization;

    public function before(User $user)
    {
        if($user->hasRole('admin'))
        {
            return true;
        }
    }

    public function index(User $user)
    {
        return $user->can("index bulletins");
    }

    /**
     * Determine whether the user can view the bulletin.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Bulletin  $bulletin
     * @return mixed
     */
    public function show(User $user, Bulletin $bulletin)
    {
        return $user->can("show bulletin");
    }

    /**
     * Determine whether the user can create bulletins.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->can("create bulletin");
    }

    public function store(User $user)
    {
        return $user->can("store bulletin");
    }

    public function edit(User $user, Bulletin $bulletin)
    {
        return ($user->can("edit bulletin") && $user->id == $bulletin->user_id);
    }

    /**
     * Determine whether the user can update the bulletin.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Bulletin  $bulletin
     * @return mixed
     */
    public function update(User $user, Bulletin $bulletin)
    {
        return ($user->can("update bulletin") && $user->id == $bulletin->user_id);
    }

    /**
     * Determine whether the user can delete the bulletin.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Bulletin  $bulletin
     * @return mixed
     */
    public function delete(User $user, Bulletin $bulletin)
    {
        return ($user->can("delete bulletin") && $user->id == $bulletin->user_id);
    }
}
