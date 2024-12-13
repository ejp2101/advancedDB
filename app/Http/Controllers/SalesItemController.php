<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SalesItem;
use App\Models\Product;

class SalesItemController extends Controller
{
    public function index(Request $request) {
        $query = SalesItem::query();

        // Search by product name
        if ($request->has('search') && !empty($request->search)) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Alphabetical Sort (A-Z or Z-A)
        if ($request->has('sort_by') && $request->sort_by == 'alphabetical') {
            $sort_order = $request->get('sort_order', 'asc');  // Default to 'asc' (A-Z)
            $query->orderBy('name', $sort_order);
        }

        // Quantity Sort (Lowest to Highest or Highest to Lowest)
        if ($request->has('sort_by') && $request->sort_by == 'quantity') {
            $sort_order = $request->get('sort_order', 'asc');  // Default to 'asc' (Lowest to Highest)
            $query->orderBy('quantity', $sort_order);
        }

        $sales_items = $query->paginate(10);

        // Return the view with the filtered/sorted medicines and current search/filter parameters
        return view('sales_items.index', compact('sales_items'))->with([
            'search' => $request->get('search'),
            'sort_by' => $request->get('sort_by'),
            'sort_order' => $request->get('sort_order')
        ]);
    }

    public function create() {
        $products = Product::all();
        return view('sales_items.create', compact('products'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'quantity' => ['required'],
            'item_code' => ['required'],

        ]);

        $sales_item = SalesItem::create([
            'quantity' => request('quantity'),
            'item_code' => request('item_code'),
        ]);
        
        $product = Product::where('code', $sales_item->item_code)->firstOrFail();
        $product->total_quantity += $sales_item->quantity; // Update existing product quantity
        $product->save();

        return redirect('/sales_items')->with('success', 'Sales item added successfully.');
    }
}
