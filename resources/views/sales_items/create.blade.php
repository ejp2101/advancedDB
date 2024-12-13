<x-layout>
    <x-slot:heading>
        Add New Sale
    </x-slot:heading>

    <form method="POST" action="/sales_items">
        @csrf

        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base font-semibold leading-7 text-gray-900">Create a Sales Item</h2>
                <p class="mt-1 text-sm leading-6 text-gray-600">We just need a handful of details from you.</p>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <x-form-field>
                        <x-form-label for="quantity">Quantity</x-form-label>

                        <div class="mt-2">
                            <x-form-input name="quantity" id="quantity" />

                            <x-form-error name="quantity" />
                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="item_code">Item Code</x-form-label>

                        <div class="mt-2">
                        <select name="item_code" id="item_code" class="form-select" required>
                        <option value="">Select an Item Code</option>
                        @foreach($products as $product)
                            <option value="{{ $product->code }}">{{ $product->code }}</option>
                        @endforeach
                    </select>
                            <x-form-error name="item_code" />
                        </div>
                    </x-form-field>
                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
            <x-form-button>Save</x-form-button>
        </div>
    </form>
</x-layout>
