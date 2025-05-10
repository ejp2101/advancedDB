<x-layout>
    <x-slot:heading>
        Product Info
    </x-slot:heading>

    <h2 class="font-bold text-lg">Category: {{ $product->sub_category }}</h2>

    <h2 class="font-bold text-lg">Product Code: {{ $product->code }}</h2>
    <p>
    <strong> @IF( $product['brand']  == NULL)
                            Unbranded:
                        @ELSE
                        {{ $product->brand }}:
                        @ENDIF
</strong>
                        {{ $product['name'] }}
    </p>
    <p>
    <strong> Quantity:  </strong>{{ abs($product->total_quantity)}}
    <br>
    <strong>Price: </strong>{{ $product['price'] }}
    </p>

    @can('edit', $product)
        <p class="mt-6">
           <x-button href="/products/{{ $product->id }}/edit">Edit Product</x-button>
        </p>
    @endcan
</x-layout>
