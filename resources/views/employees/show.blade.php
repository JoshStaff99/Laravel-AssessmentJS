<x-layout>
    <x-slot:heading>
        Employee details for: {{ $employee->first_name }} {{ $employee->last_name }}
    </x-slot:heading>

    <h2 class="font-bold text-lg mb-5">Employee Email: {{ $employee->email }}</h2>

    <h2 class="font-bold text-lg mb-5">Employee Phone Number: {{ $employee->phone_number }}</h2>

    <h2 class="font-bold text-lg mb-5">Employee ID: {{ $employee->id }}</h2>

    <h2 class="font-bold text-lg mb-5">Company ID: {{ $employee->company }}</h2>

    <p class="mt-6 mb-10">
        <x-button href="/employees/{{ $employee->id }}/edit">Update Employee</x-button> 
    </p>  
    
    <p class="mt-6 mb-10">
        <x-button href="/employees">Back to Listing</x-button> 
    </p> 
</x-layout>