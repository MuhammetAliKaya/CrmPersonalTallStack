<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Responsible;
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
        Gate::define('is_admin', function (User $user) {
            return $user->id == 1;
        });
        Gate::define('accessCustomer', function (User $user, $id) {
            info('userid ' . $user->id);
            info('id' . $id);
            return (in_array($id, Responsible::getResponsibleIds($user->id)));
        });
    }
}