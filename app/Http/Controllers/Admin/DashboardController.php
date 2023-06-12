<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Income;
use App\Models\Product;
use App\Models\ProductOrder;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        //  return /// 2023-6-7
        $orderDateArry = [
            [
                'year' => date('Y'),
                'month' => date('m')
            ]

        ];

        $dayArr = [date('D')];
        $dateArr = [date('Y-m-d')];
        $orderMonthNameArr = [date('F')];

        for ($i = 1; $i <= 5; $i++) {
            $orderDateArry[] =  [
                'year' => date('Y'),
                'month' => date('m', strtotime("-$i month"))
            ];

            $orderMonthNameArr[] = date('F', strtotime("-$i month"));
            $dayArr[] = date('D', strtotime("-$i day"));
            $dateArr[] = date('Y-m-d', strtotime("-$i day"));
        }

        // order
        $orderCountArr = [];
        foreach ($orderDateArry as $d) {
            $orderCountArr[] =   ProductOrder::whereYear('created_at', $d['year'])->whereMonth('created_at', $d['month'])->count();
        }
        //income
        $incomeArr = [];
        foreach ($dateArr as $d) {
            $incomeArr[] = Income::whereDate('create_date', $d)->sum('amount');
        }

        return view('admin.dashboard', compact('orderCountArr', 'orderMonthNameArr', 'dayArr', 'incomeArr'));
    }
}
