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

        <h1 class="font-bold text-lg mb-5">Company Employees:</h1>

        @if ($employees->isEmpty())
            <p>No employees found for this company.</p>
        @else
            <div class="space-y-4">
                @foreach ($employees as $employee)
                    <a href="/employees/{{ $employee->id }}" class="block px-4 py-6 border border-gray-200 rounded-lg hover:border-blue-800 group transition-colors duration-300">
                        <div>
                            <h2 class="font-bold text-lg mb-5">Employee Name: {{ $employee->first_name }} {{ $employee->last_name }}</h2>
                            <h2 class="font-bold text-lg mb-5">Employee Email: {{ $employee->email }}</h2>
                            <h2 class="font-bold text-lg mb-5">Employee Phone Number: {{ $employee->phone_number }}</h2>
                        </div>
                    </a>
                @endforeach
            </div>
        @endif
        
</x-layout>