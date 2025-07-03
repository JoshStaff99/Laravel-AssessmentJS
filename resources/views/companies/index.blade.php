<x-layout>
    <x-slot:heading>
        Companies Listings
    </x-slot:heading>

    <div class="relative overflow-x-auto mt-3">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Company Logo
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Company Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Company ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Created at
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>
            @foreach ($companies as $company)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        @if ($company->logo && $company->logo !== 'logos/placeholder.svg' && $company->logo !== 'logos/100.png')
                            <img 
                                src="{{ asset($company->logo) }}" 
                                alt="Company Logo" 
                                class=" h-20"
                            >
                        @else
                            <img 
                                src="{{ asset('logos/placeholder.svg') }}" 
                                alt="Placeholder Logo" 
                                class=" h-20"
                            >
                        @endif
                    </th>
                    <td class="px-6 py-4">
                        {{ $company->name }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $company->id }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $company->created_at->format('Y-m-d') }}
                    </td>
                    <td class="px-6 py-4 flex flex-col gap-2">
                        <x-button href="/companies/{{ $company->id }}">View</x-button>
                        <x-button href="/companies/{{ $company->id }}/edit">Edit</x-button>
                        <button form="delete-form-{{ $company->id }}" class="text-red-500 text-sm font-bold bg-red-200 hover:bg-red-600 rounded-md relative inline-flex items-center px-4 py-2 text-sm font-medium leading-5 rounded-md" onclick="return confirm('Are you sure you want to delete this company?')">Delete</button> 
                    </td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 px-6 py-4 text-center">
                        {{ $companies->links() }}
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>


</x-layout>