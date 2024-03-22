<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        { 
            $this->registerPolicies();
            
            Gate::define('apoteker-only', function ($user) {
            if ($user->level == 'Apoteker'){
            return true; 
            } 
            return false; 
            });
            
            Gate::define('gudang-only', function ($user) {
            if ($user->level == 'Gudang'){
            return true; 
            } 
            return false; 
            });

            Gate::define('kasir-only', function ($user) {
            if ($user->level == 'Kasir'){
            return true; 
            } 
            return false; 
            });

            Gate::define('pemilik-only', function ($user) {
            if ($user->level == 'Pemilik'){
            return true; 
            } 
            return false; 
            });
        }
    }
}