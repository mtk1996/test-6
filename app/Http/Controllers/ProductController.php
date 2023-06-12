<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function all(Request $request)
    {
        $category = Category::withCount('product')->get();
        $brand = Brand::withCount('product')->get();
        $color = Color::all();

        $product = Product::orderBy('id', 'desc');

        /// brand
        if ($brand_slug = $request->brand) { //slug
            $brand_id = Brand::where('slug', $brand_slug)->first()->id;
            $product->where('brand_id', $brand_id);
        }

        //category
        if ($category_slug = $request->category) {
            $category_id = Category::where('slug', $category_slug)->first()->id;
            $product->whereHas('category', function ($q) use ($category_id) {
                $q->where('category_products.category_id', $category_id);
            });
        }

        //category
        if ($color_slug = $request->color) {
            $color_id = Color::where('slug', $color_slug)->first()->id;
            $product->whereHas('color', function ($q) use ($color_id) {
                $q->where('color_products.color_id', $color_id);
            });
        }

        //search by name
        if ($search = $request->search) {
            $product->where('name', 'like', "%$search%");
        }

        $product  = $product->paginate(12);

        return view('product.all', compact('product', 'color', 'brand', 'category'));
    }


    public function detail($slug)
    {
        $product = Product::where('slug', $slug)
            ->with('brand', 'category', 'color', 'product_review.user')
            ->first();
        if (!$product) {
            return redirect('/')->with('error', 'Product not found.');
        }
        return view('product.detail', compact('product'));
    }
}
