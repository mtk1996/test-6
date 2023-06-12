<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductOrder;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function all()
    {
        $order = ProductOrder::orderBy('id', 'desc')
            ->with('product')
            ->paginate(20);
        return view('admin.order.index', compact('order'));
    }

    public function changeStatus()
    {
        ProductOrder::where('id', request()->id)->update([
            'status' => request()->status,
        ]);
        return redirect()->back()->with('success', 'Order Status Changed');
    }
}
