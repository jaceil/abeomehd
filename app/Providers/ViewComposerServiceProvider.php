<?php

namespace App\Providers;

use App\Project;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->composeNavigation();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     *  Bind variables to the navigation bar.
     */
    private function composeNavigation()
    {
        view()->composer('nav', function ($view)
        {
            $view->with('projects', Project::all());
            $view->with('user', Auth::User());
        });
    }
}
