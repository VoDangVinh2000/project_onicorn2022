<?php

namespace App\Providers;

use App\Http\Controllers\Page\PageController;
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
        view()->composer(['Page.partials.tabs_banner','Page.partials.edit'],
            PageController::class
        );
    }
}
