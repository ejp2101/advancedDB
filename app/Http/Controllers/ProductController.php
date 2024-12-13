<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{

    public function index(Request $request) {
        // Initialize the query to fetch products
        $query = Product::query();

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
        if ($request->has('sort_by') && $request->sort_by == 'total_quantity') {
            $sort_order = $request->get('sort_order', 'asc');  // Default to 'asc' (Lowest to Highest)
            $query->orderBy('total_quantity', $sort_order);
        }

        $products = $query->paginate(10);

        // Return the view with the filtered/sorted medicines and current search/filter parameters
        return view('products.index', compact('products'))->with([
            'search' => $request->get('search'),
            'sort_by' => $request->get('sort_by'),
            'sort_order' => $request->get('sort_order')
        ]);
    }
    
    public function show(Product $product)
    {
        return view('products.show', ['product' => $product]);
    }

    public function create()
    {
        return view('products.create');
    }

    public function store()
    {
        request()->validate([
            'sub_category' => ['required'],
            'brand' => ['required'],
            'code' => ['required'],
            'name' => ['required'],
            'total_quantity' => ['required'],
            'price' => ['required'],
            'buy_price' => ['required'],
        ]);

        $product = Product::create([
            'sub_category' => request('sub_category'),
            'brand' => request('brand'),
            'code' => request('code'),
            'name' => request('name'),
            'total_quantity' => request('total_quantity'),
            'price' => request('price'),
            'buy_price' => request('price'),
        ]);


        return redirect('/products')->with('success', 'Product added successfully.');
    }

    public function edit(Product $product)
    {
        return view('products.edit', ['product' => $product]);
    }
    
    public function update(Product $product)
    {
        request()->validate([
            'total_quantity' => ['required'],
            'price' => ['required'],
        ]);

        $product->update([
            'total_quantity' => request('total_quantity'),
            'price' => request('price'),
        ]);

        return redirect('/products/' . $product->id);
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect('/products')->with('deleted', 'Product deleted successfully.');
    }

}
