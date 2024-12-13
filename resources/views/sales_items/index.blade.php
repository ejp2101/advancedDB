<x-layout>
    <x-slot:heading>
        Sales Items
    </x-slot:heading>
    <div class="space-y-4">
    @if(session('success'))
            <div class="alert alert-success text-green-500">{{ session('success') }}</div>
        @endif
        @if(session('deleted'))
            <div class="alert alert-success text-red-500">{{ session('deleted') }}</div>
        @endif
        <form method="GET" action="{{ route('sales_items.index') }}" class="row g-2 mb-4 w">
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
        @foreach ($sales_items as $sales_item)
            <a href="" class="block px-2 py-2 border border-gray-200 rounded-lg bg-slate-300">
            <div class="text-blue-700 text-sm px-2">Product Code:  {{ $sales_item->item_code }}</div>

                <div class="grid grid-cols-3 mx-auto max-w-7xl px-2 py-2 sm:px-6 lg:px-2 sm:justify-between">
                    <div><strong class="text-laracasts">
                        @IF( $sales_item['quantity']  == NULL)
                            Quantity:
                        @ELSE
                        Quantity:

                        @ENDIF
                        </strong> {{ $sales_item['quantity'] }} </div>
                    <div><strong class="text-laracasts">Amount: </strong>{{ $sales_item['amount']}}</div>
                    <div><strong class="text-laracasts">Date: </strong>{{ ($sales_item['date'])}}</div>
                </div>
            </a>
        @endforeach

        <div>
            {{ $sales_items->links() }}
        </div>
    </div>
</x-layout>