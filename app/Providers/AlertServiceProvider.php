<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AlertServiceProvider extends ServiceProvider
{
	private $alerts = [];

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
        View::share('alerts', $this->alerts);
	}
	
	public function addAlert($type, $text)
	{
		$this->alerts[] = ['type' => $type, 'text' => $text];
	}
}
