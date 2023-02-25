<?php

namespace App\Providers;

use App\Models\WilayahDpd;
use Illuminate\Support\Facades\View;
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
        View::composer('*', function ($view) {
            $wilayahDpd = WilayahDpd::all();
            $view->with('wilayahDpd', $wilayahDpd);
        });
    }
}
