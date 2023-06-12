<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        $category = Category::orderBy('id', 'desc')
            ->withCount('product')
            ->take(8)->get();

        $productByCategory = Category::take(3)
            ->get();
        foreach ($productByCategory as $p) {
            $products = Category::find($p->id)->load(['product' => function ($q) {
                $q->take(2);
            }]);
            $p->product = $products->product;
        }

        return view('welcome', compact('category', 'productByCategory'));
    }

    public function switchLanguage($lang)
    {
        session()->put('lang', $lang);
        return redirect()->back();
    }
}
