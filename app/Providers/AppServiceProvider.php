<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
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
    public function boot(Request $request)
    {
        Model::preventLazyLoading(!app()->isProduction());

        if ($request->is('admin') || $request->is('admin/*')) {
            config(['session.cookie' => config('session.cookie_admin')]);
        } else {
            config(['session.cookie' => config('session.cookie_user')]);
        }
    }
}
