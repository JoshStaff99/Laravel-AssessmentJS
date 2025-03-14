<x-layout>
    <x-slot:heading>
        Company: {{ $company->name }} details
    </x-slot:heading>

    <h2 class="font-bold text-lg mb-5">Company Name: {{ $company->name }}</h2>

    <h2 class="font-bold text-lg mb-5">Company Email: {{ $company->email }}</h2>

    <p class="mb-5">
        <x-button href="{{ $company->website }}">Company Website</x-button>
    </p>

    <div>
    <h2 class="font-bold text-lg mb-5">Company Logo:</h2>
        <img class="text-laracasts" src='{{ $company->logo }}' />
    </div>

        <p class="mt-6">
            <x-button href="/companies/{{ $company->id }}/edit">Update Company</x-button> 
        </p>
</x-layout>