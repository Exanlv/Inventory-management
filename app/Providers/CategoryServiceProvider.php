<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;

class CategoryServiceProvider extends ServiceProvider
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
        //
	}
	

	public static function getCategories()
	{
		return DB::select('SELECT * FROM category');
	}

	public static function categoryExist($categoryName)
	{
		return DB::select('select count(name) as amount from category where lower(name) = lower(:name)', ['name' => $categoryName])[0]->amount === 1;
	}

	public static function getCategoryInfo($categoryName)
	{
		return DB::select('select * from category where lower(name) = lower(:name) limit 1', ['name' => $categoryName]);
	}

	public static function createCategory($categoryName)
	{
		return DB::insert('insert into category (name) values(:name)', ['name' => $categoryName]);
	}
}
