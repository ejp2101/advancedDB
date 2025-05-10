<x-layout>
    <x-slot:heading>
        Create New Product
    </x-slot:heading>

    <form method="POST" action="/products">
        @csrf

        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base font-semibold leading-7 text-gray-900">Create a New Product</h2>
                <p class="mt-1 text-sm leading-6 text-gray-600">We just need a handful of details from you.</p>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <x-form-field>
                        <x-form-label for="sub_category">Sub Category</x-form-label>

                        <div class="mt-2">
                            <x-form-input name="sub_category" id="sub_category" />

                            <x-form-error name="sub_category" />
                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="brand">Brand</x-form-label>

                        <div class="mt-2">
                            <x-form-input name="brand" id="brand"  />

                            <x-form-error name="brand" />
                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="code">Code</x-form-label>

                        <div class="mt-2">
                            <x-form-input name="code" id="code"  />

                            <x-form-error name="code" />
                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="name">Name</x-form-label>

                        <div class="mt-2">
                            <x-form-input name="name" id="name"  />

                            <x-form-error name="name" />
                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="total_quantity">Total Quantity</x-form-label>

                        <div class="mt-2">
                            <x-form-input type=number min="0" name="total_quantity" id="total_quantity"  />

                            <x-form-error name="total_quantity" />
                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="price">Price</x-form-label>

                        <div class="mt-2">
                            <x-form-input tpye=number step=".01" name="price" id="price"  />

                            <x-form-error name="price" />
                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="buy_price">Buy Price</x-form-label>

                        <div class="mt-2">
                            <x-form-input tpye=number step=".01" name="buy_price" id="buy_price"  />

                            <x-form-error name="buy_price" />
                        </div>
                    </x-form-field>
                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href="{{ route('products.index') }} "type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
            <x-form-button>Save</x-form-button>
        </div>
    </form>
</x-layout>
