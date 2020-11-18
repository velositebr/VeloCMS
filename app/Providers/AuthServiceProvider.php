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

        Gate::define('create-users', function($user){
            return $user->hasAnyRoles(['admin']);
        });

        Gate::define('manage-users', function($user){
            return $user->hasAnyRoles(['admin']);
        });

        Gate::define('edit-users', function($user){
            return $user->hasAnyRoles(['admin']);
        });

        Gate::define('edit-user-profile', function($user){
            return $user->hasAnyRoles(['admin', 'author', 'user']);
        });

        Gate::define('delete-users', function($user){
            return $user->hasRole('admin');
        });

        Gate::define('create-contacts', function($user){
            return $user->hasAnyRoles(['admin']);
        });

        Gate::define('manage-contacts', function($user){
            return $user->hasAnyRoles(['admin']);
        });

        Gate::define('edit-contacts', function($user){
            return $user->hasAnyRoles(['admin']);
        });

        Gate::define('create-settings', function($user){
            return $user->hasAnyRoles(['admin']);
        });

        Gate::define('manage-settings', function($user){
            return $user->hasAnyRoles(['admin']);
        });

        Gate::define('edit-settings', function($user){
            return $user->hasAnyRoles(['admin']);
        });

        Gate::define('create-pages', function($user){
            return $user->hasAnyRoles(['admin', 'author']);
        });

        Gate::define('manage-pages', function($user){
            return $user->hasAnyRoles(['admin', 'author']);
        });

        Gate::define('edit-pages', function($user){
            return $user->hasAnyRoles(['admin', 'author']);
        });

        Gate::define('create-events', function($user){
            return $user->hasAnyRoles(['admin', 'author']);
        });

        Gate::define('manage-events', function($user){
            return $user->hasAnyRoles(['admin', 'author']);
        });

        Gate::define('edit-events', function($user){
            return $user->hasAnyRoles(['admin', 'author']);
        });

        Gate::define('delete-events', function($user){
            return $user->hasAnyRoles(['admin', 'author']);
        });

        Gate::define('create-banners', function($user){
            return $user->hasAnyRoles(['admin', 'author']);
        });

        Gate::define('manage-banners', function($user){
            return $user->hasAnyRoles(['admin', 'author']);
        });

        Gate::define('edit-banners', function($user){
            return $user->hasAnyRoles(['admin', 'author']);
        });

        Gate::define('delete-banners', function($user){
            return $user->hasAnyRoles(['admin', 'author']);
        });

        Gate::define('create-albums', function($user){
            return $user->hasAnyRoles(['admin', 'author']);
        });

        Gate::define('manage-albums', function($user){
            return $user->hasAnyRoles(['admin', 'author']);
        });

        Gate::define('edit-albums', function($user){
            return $user->hasAnyRoles(['admin', 'author']);
        });

        Gate::define('delete-albums', function($user){
            return $user->hasAnyRoles(['admin', 'author']);
        });

    }
}
