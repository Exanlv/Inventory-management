<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\CategoryServiceProvider;

class CategoryController extends Controller
{
	public function index()
	{

	}

	public function create()
	{
		return view('categories.add');
	}

	public function store(Request $request)
	{
		if (!$request->has('category')) {
			abort(405);
		}

		$newCategory = $request->input('category');

		if (CategoryServiceProvider::categoryExist($newCategory)) {
			return view('categories.add', ['categoryName' => $newCategory]);
		}

		if (CategoryServiceProvider::createCategory($newCategory)) {
			return redirect()->route('categories.show', ['category' => $newCategory]);
		}
	}

	public function show($categoryName)
	{
		$categoryInfo = CategoryServiceProvider::getCategoryInfo($categoryName);

		if (!$categoryInfo) {
			return abort(404);
		}

		return view('categories.show', ['category' => $categoryInfo[0]->name]);
	}

	public function edit($categoryName)
	{

	}

	public function update($categoryName)
	{

	}
	
	public function destroy($categoryName)
	{
		
	}
}