<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Request as OtherRequest;
use App\Product;
use App\ProductImage;
use App\Rules\Price;

class ProductController extends Controller
{
	public function create()
	{
	    $category_id = old('category_id') ? old('category_id') - 1 : 0;
		return view('products.add', ['category_id' => $category_id]);
	}

    public function createInCategory($category_id)
    {
        $category_id = (old('category_id') ? old('category_id') : $category_id) - 1;
        return view('products.add', ['category_id' => $category_id]);
    }

	public function store(Request $request)
	{
		$product = $request->validate([
		    'name' => ['required', 'max:255'],
            'category_id' => ['required', 'exists:category,id'],
            'description' => [],
            'price' => [new Price]
        ]);

		$product = Product::create($product);

        if ($request->has('images')) {
            foreach ($request->file('images') as $image) {
                if (isset($image)) {
                    ProductImage::create(['product_id' => $product->id, 'path' => $image->store('public/product_images')]);
                }
            }
        }




        // if ($request->has('images0')) {
            // $request->images0->store('product_images');
        // }


		return redirect(route('categories.show', ['category' => $product->category]) . '#product-' . $product->id);
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
            'price' => [new Price]
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
        return redirect()->route('categories.show', ['category' => $product->category]);
	}
}
