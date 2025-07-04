<x-layout>
    <x-slot:heading>
        Employee details for: {{ $employee->first_name }} {{ $employee->last_name }}
    </x-slot:heading>

    <div class="max-w-7xl mx-auto py-10 px-4 mb-3">
        <div class="grid grid-cols-1 md:grid-cols-1 gap-6">
            <div class="bg-white shadow rounded-lg p-6 flex flex-col items-center">
                <h3 class="text-lg font-semibold mb-2">Employee Full Name: {{ $employee->first_name }} {{ $employee->last_name }}</h3>
                <p class="text-gray-500 mb-4 text-center">Employee Phone Number: {{ $employee->phone_number }}</p>
                <p class="text-gray-500 mb-4 text-center">Employee ID: {{ $employee->id }}</p>
                <p class="text-gray-500 mb-4 text-center">Company ID: {{ $employee->company }}</p>
                <p class="text-gray-500 mb-4 text-center">Employee Email: {{ $employee->email }}</p>
                <div class="mt-6 mb-10 flex flex-col md:flex-row gap-4">
                    <x-button href="/employees/{{ $employee->id }}/edit">Update Employee</x-button>
                    <x-button href="/employees">Back to Listing</x-button> 
                </div>
            </div>
        </div>
    </div>
 
</x-layout>