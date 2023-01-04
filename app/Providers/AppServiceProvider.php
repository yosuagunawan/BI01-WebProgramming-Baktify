<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use App\Http\Controllers\UserRoleController;
use Illuminate\Support\Facades\Gate;

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
        Paginator::useBootstrapFive();

        Gate::define('admin', function () {
            $admin_role = UserRoleController::get_role_by_name('admin');
            if (auth()->user()->role_id == $admin_role->id) {
                return true;
            } else {
                return false;
            }
        });

        Gate::define('normal', function () {
            $normal_role = UserRoleController::get_role_by_name('normal');
            if (auth()->user()->role_id == $normal_role->id) {
                return true;
            } else {
                return false;
            }
        });
    }
}
