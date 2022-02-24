<?php

namespace App\Providers;

use App\Http\Controllers\Menus\MenusController;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        return view()->composer(['Menus.index', 'Menus.index.partials'], MenusController::class);
    }
}