<x-layout>
    <x-slot:heading>
        Company details for: {{ $company->name }}
    </x-slot:heading>

    <h2 class="font-bold text-lg mb-5">Company Name: {{ $company->name }}</h2>

    <h2 class="font-bold text-lg mb-5">Company Email: {{ $company->email }}</h2>

    <h2 class="font-bold text-lg mb-5">Company ID: {{ $company->id }}</h2>

    <p class="mb-5">
        <x-button href="{{ $company->website }}">Company Website</x-button>
    </p>

    <div>
    <h2 class="font-bold text-lg mb-5">Company Logo:</h2>
        <img class="text-laracasts" src='{{ asset($company->logo) }}' />
    </div>

    <p class="mt-6 mb-10">
        <x-button href="/companies/{{ $company->id }}/edit">Update Company</x-button> 
    </p>

    <p class="mt-6 mb-10">
        <x-button href="/companies">Back to Listing</x-button> 
    </p> 

    <h1 class="font-bold text-lg mb-5">Company Employees:</h1>

    <div class="hidden md:block min-h-full">
        <div class="mx-auto max-w-7xl">
            <div class="flex h-16 items-center bg-gray-800 border-y border-white">
                <h2 class="flex-1 text-white text-center px-3 py-2 text-sm font-medium">ID</h2>
                <h2 class="flex-1 text-white text-center px-3 py-2 text-sm font-medium">Full Name</h2>
                <h2 class="flex-1 text-white text-center px-3 py-2 text-sm font-medium">Email</h2>
                <h2 class="flex-1 text-white text-center px-3 py-2 text-sm font-medium">Phone Number</h2>
            </div>
        </div>
    </div>

    @if ($employees->isEmpty())
        <p>No employees found for this company.</p>
    @else
        <div class=" grid grid-cols-1">
            @foreach ($employees as $employee)
            <div class="block px-4 py-6 border border-gray-200 hover:border-blue-800 group transition-colors duration-300">
                <div class="block md:flex items-center">
                    <div class="flex-1 text-center px-3 py-2 mb-5">
                        <span class="md:hidden block font-semibold">Employee ID:</span>
                        <h2 class="text-lg">{{ $employee->id }}</h2>
                    </div>
                    <div class="flex-1 text-center px-3 py-2 mb-5">
                        <span class="md:hidden block font-semibold">Employee Name:</span>
                        <h2 class="text-lg">{{ $employee->first_name }} {{ $employee->last_name }}</h2>
                    </div>
                    <div class="flex-1 text-center px-3 py-2 mb-5">
                        <span class="md:hidden block font-semibold">Employee Email:</span>
                        <h2 class="text-lg">{{ $employee->email }}</h2>
                    </div>
                    <div class="flex-1 text-center px-3 py-2 mb-5">
                        <span class="md:hidden block font-semibold">Employee Phone Number:</span>
                        <h2 class="text-lg">{{ $employee->phone_number }}</h2>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    @endif
        
</x-layout>