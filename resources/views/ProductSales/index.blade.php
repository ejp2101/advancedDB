<x-layout>
    <x-slot:heading>
        Product and Sales table
    </x-slot:heading>
    <table class="table-auto w-full border border-gray-300">
            <thead class="bg-gray-200">
                <tr>
                    <th class="px-4 py-2 border border-gray-300 text-center w-1/6">Product Code</th>
                    <th class="px-4 py-2 border border-gray-300 text-center w-1/6">Date</th>
                    <th class="px-4 py-2 border border-gray-300 text-center w-1/6">Product Name</th>
                    <th class="px-4 py-2 border border-gray-300 text-center w-1/6">Price</th>
                    <th class="px-4 py-2 border border-gray-300 text-center w-1/6">Quantity Sold</th>
                    <th class="px-4 py-2 border border-gray-300 text-center w-1/6">Revenue</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($results as $result)
                @php
                $price = $result->price;
                $amount = $result->amount;
                $quantity = $result->quantity;
                @endphp
                <tr class="hover:bg-gray-100">
                        <td class="px-4 py-2 border border-gray-300 text-center">{{ $result->code }}</td>
                        <td class="px-4 py-2 border border-gray-300 text-center">{{ $result->create_date }}</td>
                        <td class="px-4 py-2 border border-gray-300 text-center">{{ $result->name }}</td>
                        <td class="px-4 py-2 border border-gray-300 text-center">{{ $result->price }}</td>
                        <td class="px-4 py-2 border border-gray-300 text-center">{{ $result->quantity }}</td>
                        <td class="px-4 py-2 border border-gray-300 text-center">
                        @IF (($price * $quantity) == 0)
                        {{ $result->amount }}
                        @ELSE
                        {{ $result->price * $result->quantity }}
                        @ENDIF
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="px-4 py-2 text-center text-gray-500">No sales data available.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination Links -->
    <div class="mt-6 flex justify-center">
        {{ $results->links('pagination::tailwind') }}
    </div>
    </div>
</x-layout>