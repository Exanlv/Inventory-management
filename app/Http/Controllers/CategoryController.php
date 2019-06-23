<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\CategoryServiceProvider;
use App\Category;

class CategoryController extends Controller
{
	public function index()
	{
		return view('categories.list');
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

		$categoryName = $request->input('category');

		if (Category::where('name', $categoryName)->first()) {
			return view('categories.add', ['categoryName' => $categoryName]);
		}

		$newCategory = new Category;
		$newCategory->name = $categoryName;
		$newCategory->save();

		return redirect()->route('categories.show', ['category' => $newCategory]);
	}

	public function show(Category $category)
	{
		return view('categories.show', ['category' => $category->name]);
	}

	public function edit(Category $category, Request $request)
	{

	}

	public function update(Category $category, Request $request)
	{
		
	}
	
	public function destroy(Category $category, Request $request)
	{
		$category->delete();
		return redirect()->route('categories.index');
	}
}