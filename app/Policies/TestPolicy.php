<?php

namespace App\Policies;

use App\User;
use App\odel=Test;
use Illuminate\Auth\Access\HandlesAuthorization;

class TestPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the odel=Test.
     *
     * @param  \App\User  $user
     * @param  \App\odel=Test  $odel=Test
     * @return mixed
     */
    public function view(User $user, odel=Test $odel=Test)
    {
        //
    }

    /**
     * Determine whether the user can create odel=Tests.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the odel=Test.
     *
     * @param  \App\User  $user
     * @param  \App\odel=Test  $odel=Test
     * @return mixed
     */
    public function update(User $user, odel=Test $odel=Test)
    {
        //
    }

    /**
     * Determine whether the user can delete the odel=Test.
     *
     * @param  \App\User  $user
     * @param  \App\odel=Test  $odel=Test
     * @return mixed
     */
    public function delete(User $user, odel=Test $odel=Test)
    {
        //
    }
}
