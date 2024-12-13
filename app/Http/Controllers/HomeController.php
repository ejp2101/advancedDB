<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index () {
        $result = DB::table('sales_items')
        ->join('products', 'sales_items.item_code', '=', 'products.code')
        ->selectRaw('
            SUM(abs(sales_items.quantity) * abs(products.price)) AS revenue,
             SUM(abs(sales_items.quantity) * abs(products.buy_price)) AS capital,
            (SUM(abs(sales_items.quantity) * abs(products.price)) - SUM(abs(sales_items.quantity) * abs(products.buy_price))) AS profit
        ')
        ->first();

        $revenue = $result->revenue;
        $profit = $result->profit;
        $capital = $result->capital;

        return view('home', compact('revenue','profit','capital'));
    }
}
