<?php

namespace App\Providers;

use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;

class ViewService extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(Request $request)
    {
        // Fonction fléchée possible
        view()->composer(['partials.menu'], function($view) use($request) {
            $isAdmin = false;
            if ($request->user()) {
                switch ($request->user()->elevation) {
                    case "admin": 
                        $isAdmin = true;
                        break;
                }
            }

            $view->with(['isAdmin'=>$isAdmin]);
        });
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
}
