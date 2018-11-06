<?php

namespace App\Policies;

use App\User;
use App\Mail\Contact;
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
    public function view(User $user, Contact $contact)
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
        return true; //$user->isAdminOrSuperAdmin(); 
    }

    /**
     * Determine whether the user can update the odel=Contact.
     *
     * @param  \App\User  $user
     * @param  \App\odel=Contact  $odel=Contact
     * @return mixed
     */


    public function send(User $user, Contact $contact)
        { 
           return true; //$user->isAdminOrSuperAdmin(); 
        } 

    public function update(User $user, Contact $contact)
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
    public function delete(User $user, Contact $contact)
    {
        //
    }

}
