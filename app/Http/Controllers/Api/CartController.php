<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCart;
use App\Models\ProductOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        //check product
        $slug = $request->slug;

        $findProduct = Product::where('slug', $slug)->first();
        if (!$findProduct) {
            return 'product_not_found';
        }
        //auth
        if (!auth()->check()) {
            return 'not_auth';
        }

        $checkCart  = ProductCart::where('user_id', auth()->id())
            ->where('product_id', $findProduct->id)
            ->first();
        if ($checkCart) {
            ProductCart::where('id', $checkCart->id)->update([
                'qty' => DB::raw('qty+1'),
            ]);
        } else {
            ProductCart::create([
                'user_id' => auth()->id(),
                'product_id' => $findProduct->id,
                'qty' => 1
            ]);
        }
        $cart_count = ProductCart::where('user_id', auth()->id())->count();
        $data = [
            'success' => true,
            'cart_count' => $cart_count,
        ];
        return response()->json($data);
    }

    public function getCart()
    {
        $cart = ProductCart::where('user_id', auth()->id())
            ->with('product')
            ->orderBy('id', 'desc')->get();
        return response()->json($cart);
    }

    public function addQty(Request $request)
    {
        $id =  $request->id;
        ProductCart::where('id', $id)->update([
            'qty' => DB::raw('qty+1'),
        ]);
        return 'success';
    }

    public function checkout(Request $request)
    {
        //image upload
        $file = $request->file('image');
        $file_name = uniqid() . $file->getClientOriginalName();
        $file->move(public_path('/images'), $file_name);

        $name = $request->name;
        $phone = $request->phone;
        $address = $request->address;

        $cart = ProductCart::where('user_id', auth()->id())->get();
        foreach ($cart as $c) {
            ProductOrder::create([
                'user_id' => auth()->id(),
                'product_id' => $c->product_id,
                'qty' => $c->qty,
                'payment_screenshot' => $file_name,
                'address' => $address,
                'phone' => $phone,
                'name' => $name
            ]);

            Product::where('id', $c->product_id)->update([
                'order_count' => DB::raw('order_count+1')
            ]);
        }

        ProductCart::where('user_id', auth()->id())->delete();
        return 'success';
    }


    public function getOrder()
    {
        $order = ProductOrder::where('user_id', auth()->id())
            ->with('product')
            ->orderBy('id', 'desc')
            ->paginate(1);
        return response()->json($order);
    }
}
