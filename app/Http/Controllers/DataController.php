<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
class DataController extends Controller
{
    public function export()
    {
        $categorys = [];
        foreach (Category::all() as $category) {

            $products = [];
            foreach ($category->products->all() as $product) {

                $images = [];
                foreach ($product->images->all() as $image) {
                    $images[] = $image->path;
                }

                $products[] = [
                    'name' => $product->name,
                    'price' => $product->price,
                    'description' => $product->description,
                    'images' => $images
                ];
            }

            $categorys[] = [$category->name => $products];
        }
        return json_encode($categorys);
        return view('data.export');
    }
}
