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
		$request->validate([
			'category' => ['required', 'max:255', 'unique:category,name']
		]);

		$newCategory = Category::create(['name' => $request->input('category')]);

		return redirect()->route('categories.show', ['category' => $newCategory]);
	}

	public function show(Category $category)
	{
		return view('categories.show', ['category' => $category]);
	}

	public function edit(Category $category)
	{
		return view('categories.edit', ['category' => $category]);
	}

	public function update(Request $request, Category $category)
	{
		$request->validate([
			'category' => ['required','max:255']
		]);

		$category->name = $request->input('category');
		$category->save();

		return redirect()->route('categories.show', ['category' => $category]);
	}
	
	public function destroy(Category $category, Request $request)
	{
		$category->delete();
		return redirect()->route('categories.index');
	}
}