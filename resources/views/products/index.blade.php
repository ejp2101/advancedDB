<x-layout>
    <x-slot:heading>
        Product List
    </x-slot:heading>


    <div class="space-y-4">
    @if(session('success'))
            <div class="alert alert-success text-green-500">{{ session('success') }}</div>
        @endif
        @if(session('deleted'))
            <div class="alert alert-success text-red-500">{{ session('deleted') }}</div>
        @endif

    <form method="GET" action="{{ route('products.index') }}" class="row g-2 mb-4 w">
            @csrf

            <div class="flex h-4 items-center justify-between">
                <div class="col-md-4">
                    <x-form-input type="text" name="search" value="{{ old('search', $search) }}" placeholder="Search by name" class="form-control">
                    </x-form-input>
                </div>
                <div class="col-md-3">
                    <select name="sort_by" class="form-select">
                        <option value="alphabetical" {{ $sort_by == 'alphabetical' ? 'selected' : '' }}>Alphabetical</option>
                        <option value="quantity" {{ $sort_by == 'quantity' ? 'selected' : '' }}>Quantity</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <select name="sort_order" class="form-select">
                        <option value="asc" {{ $sort_order == 'asc' ? 'selected' : '' }}>asc</option>
                        <option value="desc" {{ $sort_order == 'desc' ? 'selected' : '' }}>desc</option>
                    </select>
                </div>
                <div class="filters col-md-2">
                    <x-form-button type="submit" class="btn btn-primary w-200">Apply Filters</x-form-button>
                </div>
            </div>
        </form>
        @foreach ($products as $product)
            <a href="/products/{{ $product['id'] }}" class="block px-2 py-2 border border-gray-200 rounded-lg bg-slate-300">
                <div class="flex h-4 items-center justify-between">
                    <div class="text-blue-700 text-sm px-2">Category: {{ $product->sub_category }}</div>
                    <div class="text-blue-700 text-sm px-2">Product Code: {{ $product->code }}</div>
                </div>
                <div class=" grid grid-cols-3 mx-auto max-w-7xl px-2 py-2 sm:px-6 lg:px-2 sm:justify-between">
                    <div><strong class="text-laracasts">
                        @IF( $product['brand']  == NULL)
                            Unbranded:
                        @ELSE
                        {{ $product->brand }}:
                        @ENDIF
                        </strong> {{ $product['name'] }} </div>
                    <div><strong class="text-laracasts">Quantity: </strong>{{ abs($product->total_quantity)}}</div>
                    <div><strong class="text-laracasts">Price: </strong>{{ ($product->price)}}</div>
                </div>
            </a>
        @endforeach

        <div>
            {{ $products->links() }}
        </div>
    </div>
</x-layout>