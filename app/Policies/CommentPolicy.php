<?php

namespace App\Policies;

use App\User;
use App\Comment;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommentPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the comment.
     *
     * @param  \App\User  $user
     * @param  \App\Comment  $comment
     * @return mixed
     */

   public function before (User $user, $ability)
        {
            if($user->isSuperAdmin())
                {
                    return true;
                }
        }

    public function view(User $user, Comment $comment)
    { 
        return true;
    }

    /**
     * Determine whether the user can create comments.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create( User $user, Comment $comment)
        {
            return $user->isUser();
        }

    public function store(User $user)
        {
            return $user->isUser();
        }

    /**
     * Determine whether the user can update the comment.
     *
     * @param  \App\User  $user
     * @param  \App\Comment  $comment
     * @return mixed
     */
    public function update(User $user, Comment $comment)
    {
        return $user->isAdmin();
    }
    /**
     * Determine whether the user can delete the comment.
     *
     * @param  \App\User  $user
     * @param  \App\Comment  $comment
     * @return mixed
     */
    public function delete(User $user, Comment $comment)
    {
        return $user->isOwner($comment->user_id);
        
    }

    public function alert(User $user, Comment $comment)
        {
           return $user->canAlert($comment->id);
        }

    public function like()
        {
            return $user->isUser();

        }

    public function dislike()
        {
            return $user->isUser();
        }

    public function allow()
        {
            return $user->isAdmin();
        }
}
