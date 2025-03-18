<x-layout>
    <x-slot:heading>
        Companies Listings
    </x-slot:heading>

    <div class="space-y-4">
        @foreach ($companies as $company)
            <a href="/companies/{{ $company->id }}" class="block px-4 py-6 border border-gray-200 rounded-lg">
                <div class="font-bold text-blue-500 text-sm">{{ $company->name }}</div>

                <div>
                    <img class="text-laracasts" src="{{ asset($company->logo) }}" alt="Company Logo" />
                </div>
            </a>
        @endforeach

        <div>
            {{ $companies->links() }}
        </div>
    </div>
</x-layout>