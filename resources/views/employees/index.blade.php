<x-layout>
    <x-slot:heading>
        Employees Listings
    </x-slot:heading>

    <div class="space-y-4">
        @foreach ($employees as $employee)
            <a href="/employees/{{ $employee->id }}" class="block px-4 py-6 border border-gray-200 rounded-lg">
                <div>
                    <h2 class="font-bold text-lg mb-5">Employee Name: {{ $employee->first_name }} {{ $employee->last_name }}</h2>
                    <h2 class="font-bold text-lg mb-5">Employee Email: {{ $employee->email }}</h2>
                    <h2 class="font-bold text-lg mb-5">Employee Phone Number: {{ $employee->phone_number }}</h2>
                </div>
            </a>
        @endforeach

        <div>
            {{ $employees->links() }}
        </div>
    </div>
</x-layout>