<?php

namespace App\Providers;

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
        'App\Models\Model' => 'App\Policies\ModelPolicy',
        'App\Models\BlogPost' => 'App\Policies\BlogPostPolicy',
        'App\Models\User' => 'App\Policies\UserPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Gate::define('create-post', function ($user) {
        //     return $user->is_admin==0;
        // });

        Gate::define('update-post', function ($user, $post) {
            return $user->id == $post->user_id;
        });

        Gate::define('home.contact', function ($user) {
            return $user->is_admin;
        });

        Gate::define('home.dash', function ($user) {
            return $user->is_admin;
        });

        Gate::define('home.create', function ($user) {
            return $user->is_admin==0;
        });

        Gate::before(function ($user, $ability) {
            if($user -> is_admin && in_array($ability, ['delete'])) {
                return true;
            }
        });

    }

}
