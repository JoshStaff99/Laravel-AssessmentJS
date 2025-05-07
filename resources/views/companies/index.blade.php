<x-layout>
    <x-slot:heading>
        Companies Listings
    </x-slot:heading>

    <div class="hidden md:block min-h-full">
            <div class="mx-auto max-w-7xl">
                <div class="flex h-16 items-center bg-gray-800 border-y border-white">
                    <h2 class="flex-1 text-white text-center px-3 py-2 text-sm font-medium">Company ID</h2>
                    <h2 class="flex-1 text-white text-center px-3 py-2 text-sm font-medium">Company Logo</h2>
                    <h2 class="flex-1 text-white text-center px-3 py-2 text-sm font-medium">Company Name</h2>
                    <h2 class="flex-1 text-white text-center px-3 py-2 text-sm font-medium">Created At</h2>
                </div>
            </div>
    </div>
    <div class="grid grid-cols-1">
        @foreach ($companies as $company)
            <div class="block px-4 py-6 border border-gray-200 hover:border-blue-800 group transition-colors duration-300">
                <div class="block md:flex items-center border-gray-300">
                    <div class="flex-1 text-center px-3 py-2 text-sm text-blue-500 font-medium"><h2 class="md:hidden px-3">Company Id:</h2>{{ $company->id }}</div>
                    <div class="flex-1 text-center px-3 py-2">
                        <img src="{{ asset($company->logo) }}" alt="Company Logo" class="mx-auto h-20">
                    </div>
                    <div class="flex-1 text-center px-3 py-2 text-sm text-blue-500 font-medium"><h2 class="md:hidden px-3">Company Name:</h2>{{ $company->name }}</div>
                    <div class="flex-1 text-center px-3 py-2 text-sm text-blue-500 font-medium"><h2 class="md:hidden px-3">Created At:</h2>{{ $company->created_at->format('Y-m-d') }}</div>
                </div>

                
                <div class="mt-6 flex items-center justify-between gap-x-6">
                    <div>
                        <x-button href="/companies/{{ $company->id }}">View Company Details</x-button> 
                    </div>

                    <div class="flex items-center gap-x-6">
                        <p class="">
                            <x-button href="/companies/{{ $company->id }}/edit">Edit</x-button> 
                        </p>

                        <div class="flex items-center">
                            <button form="delete-form-{{ $company->id }}" class="text-red-500 text-sm font-bold" onclick="return confirm('Are you sure you want to delete this company?')">Delete</button>
                        </div>
                    </div>
                </div>

                <form method="POST" action="/companies/{{ $company->id }}" id="delete-form-{{ $company->id }}" class="hidden">
                    @csrf
                    @method('DELETE')
                </form>
            </div>
        @endforeach

    </div>
    <div class="mt-10">
        {{ $companies->links() }}
    </div>
</x-layout>