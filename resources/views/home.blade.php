<x-layout>
    <x-slot:heading>
        Home Page
    </x-slot:heading>

    <!-- Date Range Filter Form -->
    <form method="GET" action="{{ url('/') }}" class="my-4 flex items-center space-x-4">
        <div>
            <label for="start_date">Start Date:</label>
            <input type="date" id="start_date" name="start_date" value="{{ request('start_date') }}" class="border rounded px-2 py-1">
        </div>
        <div>
            <label for="end_date">End Date:</label>
            <input type="date" id="end_date" name="end_date" value="{{ request('end_date') }}" class="border rounded px-2 py-1">
        </div>
        <button type="submit" class="btn btn-primary px-4 py-2">Filter</button>
    </form>

    <!-- Revenue and Profit Display -->
    <a href="#" class="block px-2 py-2 my-4 border border-gray-200 rounded-lg bg-slate-300">
        <div class="flex h-20 py-4 items-center justify-between" style="font-size: 2rem;">
            <h1><strong>Revenue: </strong><br></h1>
            <h1>Php {{ number_format($revenue, 2) }} </h1>
        </div>
    </a>
    <a href="#" class="block px-2 py-2 my-4 border border-gray-200 rounded-lg bg-slate-300">
        <div class="flex h-20 py-4 items-center justify-between" style="font-size: 2rem;">
            <h1><strong>Profit: </strong><br></h1>
            <h1>Php {{ number_format($profit, 2) }} </h1>
        </div>
    </a>
</x-layout>
