<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductSalesController extends Controller
{
    public function index() {
        $results = DB::table('products')
            ->join('sales_items', 'products.code', '=', 'sales_items.item_code')
            ->select('products.code'
            ,'products.name'
            ,'products.buy_price'
            ,'products.price'
            ,'sales_items.quantity'
            ,'sales_items.amount'
            ,'sales_items.create_date')
            ->paginate(10);

            return view('ProductSales.index', compact('results'));

    }
}
