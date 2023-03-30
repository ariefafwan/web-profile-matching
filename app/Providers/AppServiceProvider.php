<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Gate::define('admin', function ($user) {
            if ($user->role_id == '1') {
                return true;
            }
            return false;
        });
        Gate::define('user', function ($user) {
            if ($user->role_id == '2') {
                return true;
            }
            return false;
        });

        Paginator::useBootstrap();
    }
}
