<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(Request $request)
{
    // Get start and end dates from the request
    $startDate = $request->input('start_date');
    $endDate = $request->input('end_date');

    // Query to calculate revenue and profit
    $query = DB::table('sales_items')
        ->join('products', 'sales_items.item_code', '=', 'products.code')
        ->selectRaw('
            SUM(sales_items.quantity * products.price) AS revenue,
            SUM(sales_items.quantity * products.buy_price) AS capital,
            (SUM(sales_items.quantity * products.price) - SUM(sales_items.quantity * products.buy_price)) AS profit
        ');

    // Apply date filter if provided
    if ($startDate && $endDate) {
        $query->whereBetween('sales_items.date', [$startDate, $endDate]);
    }

    $result = $query->first();

    // Extract revenue, profit, and capital from the result
    $revenue = $result->revenue ?? 0;
    $profit = $result->profit ?? 0;
    $capital = $result->capital ?? 0;

    return view('home', compact('revenue', 'profit', 'capital'));
}

}
