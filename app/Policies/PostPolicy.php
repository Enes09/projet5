<?php

namespace App\Policies;

use App\User;
use App\Post;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the odel=Post.
     *
     * @param  \App\User  $user
     * @param  \App\odel=Post  $odel=Post
     * @return mixed
     */
    public function view(User $user)
        {
            return $user->isSuperAdmin();
        }

    /**
     * Determine whether the user can create odel=Posts.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        /*
        return 

            if($user->isAdmin() || $user->isSuperAdmin())
                {
                    return true;
                }
            else
                {
                    return false;
                }
               */ 
    }

    /**
     * Determine whether the user can update the odel=Post.
     *
     * @param  \App\User  $user
     * @param  \App\odel=Post  $odel=Post
     * @return mixed
     */
    public function update(User $user,  Post $post)
    {
        //
    }

    /**
     * Determine whether the user can delete the odel=Post.
     *
     * @param  \App\User  $user
     * @param  \App\odel=Post  $odel=Post
     * @return mixed
     */
    public function delete(User $user,  Post $post)
    {
        //
    }
}
