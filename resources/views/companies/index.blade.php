<x-layout>
    <x-slot:heading>
        Companies Listings
    </x-slot:heading>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        @foreach ($companies as $company)
            <div class="block px-4 py-6 border border-gray-200 rounded-lg hover:border-blue-800 group transition-colors duration-300">
                <div class="font-bold text-blue-500 text-sm">{{ $company->name }}</div>

                <div>
                    <img class="text-laracasts" src="{{ asset($company->logo) }}" alt="Company Logo" />
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