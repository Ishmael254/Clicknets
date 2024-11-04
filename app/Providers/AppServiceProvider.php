<?php

namespace App\Providers;
use Illuminate\Support\Facades\Auth;
use App\Models\Notifications;


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
  view()->composer('layouts.myapp', function($view) {

    $id = Auth::user()->id;   
    $myvar = Notifications::all();

    $view->with('data', array('myvar' => $myvar));
  });
}
}
