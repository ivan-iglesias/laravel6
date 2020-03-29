<?php

namespace App\Providers;

use App\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        /*
         No la necesitamos usando PostPolicy

         Si queremos que que sea valido para invitados, podemos añadir ? delante de User

         Gate::define('update-post', function(User $user, Post $post){
            return ! $post->author->is($user);
         });
        */

        // Para admin, no quiero tener que hacerlo en todos los "Policy", por lo que lo añado aqui
        Gate::before(function(User $user){
            if ($user->id === 2) { // admin
                return true;
            }
        });
    }
}
