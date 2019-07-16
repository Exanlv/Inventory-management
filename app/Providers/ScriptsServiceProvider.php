<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ScriptsServiceProvider extends ServiceProvider
{
    private $scripts = [];
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
        View::share('scripts', $this->scripts);
    }

    /**
     * Add a script
     */
    public function addScript($script)
    {
        $this->scripts[] = $script;
    }
}
