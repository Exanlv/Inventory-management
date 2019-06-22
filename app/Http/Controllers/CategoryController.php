<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
	public function show($category)
	{
		$categoryInfo = DB::select('select * from categories where lower(name) = lower(:name)', ['name' => $category]);

		if (count($categoryInfo) !== 1) {
			return abort(404);
		}

		return view('category.show', ['category' => $categoryInfo[0]->name]);
	}

	public function add()
	{
		return view('category.add');
	}
}