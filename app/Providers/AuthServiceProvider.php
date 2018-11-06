<?php

namespace App\Providers;

use App\Post;
use App\Policies\PostPolicy;
use App\Comment;
use App\User;
use App\Policies\UserPolicy;
use App\Policies\CommentPolicy;
use App\Policies\ContactPolicy;
use App\Mail\Contact;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
        Post::class => PostPolicy::class,
        Comment::class => CommentPolicy::class,
        User::class => UserPolicy::class,
        Contact::class => ContactPolicy::class,
    ]; 

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
