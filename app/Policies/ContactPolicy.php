<?php

namespace App\Policies;

use App\User;
use App\odel=Contact;
use Illuminate\Auth\Access\HandlesAuthorization;

class ContactPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the odel=Contact.
     *
     * @param  \App\User  $user
     * @param  \App\odel=Contact  $odel=Contact
     * @return mixed
     */
    public function view(User $user, odel=Contact $odel=Contact)
    {
        //
    }

    /**
     * Determine whether the user can create odel=Contacts.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the odel=Contact.
     *
     * @param  \App\User  $user
     * @param  \App\odel=Contact  $odel=Contact
     * @return mixed
     */
    public function update(User $user, odel=Contact $odel=Contact)
    {
        //
    }

    /**
     * Determine whether the user can delete the odel=Contact.
     *
     * @param  \App\User  $user
     * @param  \App\odel=Contact  $odel=Contact
     * @return mixed
     */
    public function delete(User $user, odel=Contact $odel=Contact)
    {
        //
    }

    public function sendToSite(User $user, Contact $contact)
        {
            return isUser();
        }
}
