<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Log;

use App\Providers\CategoryServiceProvider;

use App\Category;
use App\Scripts;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('script', function($input) {
            $input = trim(trim($input), '\'"');
            return '<?php $__env->startPush(\'componentScripts\'); ?>\'' . $input . '\',<?php $__env->stopPush(); ?>';
        });
        View::share('categories', Category::all());
	}
}
