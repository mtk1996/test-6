<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Composer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Product::orderBy('id', 'desc')
            ->with('category')
            ->paginate(20);
        return view('admin.product.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brand = Brand::all();
        $category = Category::all();
        $color = Color::all();
        return view('admin.product.create', compact('brand', 'category', 'color'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => "required",
            "image" => 'required|mimes:png,jpg,webp|max:2048',
            "stock_qty" => 'required|integer',
            "sell_price" => 'required|integer',
            "discounted_price" => 'required|integer',
            "description" => 'required',
            "brand_id" => 'required',
            "category_id" => 'required',
        ]);

        $file = $request->file('image');
        $file_name = uniqid() . $file->getClientOriginalName();
        $file->move(public_path('/images'), $file_name);


        $slug = Str::slug($request->name) . uniqid();
        $created_product =  Product::create([
            'slug' => $slug,
            'brand_id' => $request->brand_id,
            'name' => $request->name,
            'stock_qty' => $request->stock_qty,
            'sell_price' => $request->sell_price,
            'discounted_price' => $request->discounted_price,
            'description' => $request->description,
            'image' => $file_name,
            'order_count' => 0,
        ]);

        $p = Product::find($created_product->id);
        $p->category()->sync($request->category_id);
        $p->color()->sync($request->color_id);

        return redirect()->back()->with('success', 'Product stored');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand = Brand::all();
        $category = Category::all();
        $color = Color::all();
        $product = Product::where('id', $id)
            ->with('category', 'color')
            ->first();
        return view('admin.product.edit', compact('brand', 'category', 'color', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Product::find($id);

        $file = $request->file('image'); //{soe} {}
        if ($file) {
            $file_name = uniqid() . $file->getClientOriginalName();
            $file->move(public_path('/images'), $file_name);
            File::delete(public_path('/images/' . $data->image));
        } else {
            $file_name = $data->image;
        }

        $data->update([
            'brand_id' => $request->brand_id,
            'name' => $request->name,
            'stock_qty' => $request->stock_qty,
            'sell_price' => $request->sell_price,
            'discounted_price' => $request->discounted_price,
            'description' => $request->description,
            'image' => $file_name,
            'order_count' => 0,
        ]);

        $data->category()->sync($request->category_id);
        $data->color()->sync($request->color_id);
        return redirect()->back()->with('success', 'Product Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Product::find($id);

        File::delete(public_path('/images/' . $data->image));
        $data->category()->sync([]);
        $data->color()->sync([]);
        $data->delete();

        return redirect()->back()->with('success', 'Deleted.');
    }
}
