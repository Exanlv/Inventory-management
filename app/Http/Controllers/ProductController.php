<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
	public function create()
	{
		return view('products.add');
	}

	public function store(Request $request)
	{
		$product = $request->validate([
		    'name' => ['required', 'max:255'],
            'category_id' => ['required', 'exists:category,id'],
            'description' => [],
            'price' => []
        ]);

		$product = Product::create($product);

		return $product;
	}

	public function show(Product $product)
	{
        return view('products.show', ['product' => $product]);
	}

	public function edit(Product $product)
	{
        return view('products.edit', ['product' => $product]);
	}

	public function update(Request $request, Product $product)
	{
        $validatedData = $request->validate([
            'name' => ['required', 'max:255'],
            'category_id' => ['required', 'exists:category,id'],
            'description' => [],
            'price' => []
        ]);

        $product->name = $validatedData['name'];
        $product->category_id = $validatedData['category_id'];
        $product->description = $validatedData['description'];
        $product->price = $validatedData['price'];

        $product->save();

        return $product;
	}

	public function destroy(Product $product)
	{
        $product->delete();
	}
}
