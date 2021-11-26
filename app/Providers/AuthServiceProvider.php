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
        // 'App\Models\User' => 'App\Policies\UserPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // view all payments - admin rights 
        // Gate::define('view_all_payments', [UserPolicy::class, 'view_all_payments']);
        Gate::define('isAdmin', function($user) {
            return $user->is_admin == true;
        });

        Gate::define('isStaff', function($user) {
            return $user->is_staff == true;
        });
    }
}
