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
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('edit-user', function ($user) {
            return $user->is_active==0;
        });

        Gate::define('update-user', function ($user) {
            return $user->is_active==0;
        });

        Gate::before(function ($user) {
            if($user->is_admin==1)  {
                return true;
        }
        });

    }
}
