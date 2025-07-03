<x-layout>
    <x-slot:heading>
        Company details for: {{ $company->name }}
    </x-slot:heading>

    <div class="max-w-7xl mx-auto py-10 px-4 mb-3">
        <div class="grid grid-cols-1 md:grid-cols-1 gap-6">
            <div class="bg-white shadow rounded-lg p-6 flex flex-col items-center">
                <h3 class="text-lg font-semibold mb-2">Company Name: {{ $company->name }}</h3>
                <p class="text-gray-500 mb-4 text-center">Company Logo:</p>
                <div class=" p-3 mb-4">
                    @if ($company->logo && $company->logo !== 'logos/placeholder.svg' && $company->logo !== 'logos/100.png')
                        <img 
                            src="{{ asset($company->logo) }}" 
                            alt="Company Logo" 
                            class="text-laracasts"
                        >
                    @else
                        <img 
                            src="{{ asset('logos/placeholder.svg') }}" 
                            alt="Placeholder Logo" 
                            class="text-laracasts"
                        >
                    @endif
                </div>
                <p class="text-gray-500 mb-4 text-center">Company ID: {{ $company->id }}</p>
                <p class="text-gray-500 mb-4 text-center">Company Email: {{ $company->email }}</p>
                <div class="mt-6 mb-10 flex flex-col md:flex-row gap-4">
                    <x-button href="{{ $company->website }}">Company Website</x-button>
                    <x-button href="/companies/{{ $company->id }}/edit">Update Company</x-button>
                    <x-button href="/companies">Back to Listing</x-button>
                </div>
            </div>
        </div>
    </div>

    <h1 class="font-bold text-lg mb-5">Company Employees:</h1>

    @if ($employees->isEmpty())
        <p>No employees found for this company.</p>
    @else
        <div class="relative overflow-x-auto mt-3">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Employee Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Employee ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Employee Email
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Employee Phone Number
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($employees as $employee)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $employee->first_name }} {{ $employee->last_name }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $employee->id }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $employee->email }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $employee->phone_number }}
                        </td>
                        <td class="px-6 py-4 flex flex-col gap-2">
                            <x-button href="/employees/{{ $employee->id }}">View</x-button>
                            <x-button href="/employees/{{ $employee->id }}/edit">Edit</x-button>
                            <button form="delete-form-{{ $employee->id }}" class="text-red-500 text-sm font-bold bg-red-200 hover:bg-red-600 rounded-md relative inline-flex items-center px-4 py-2 text-sm font-medium leading-5 rounded-md" onclick="return confirm('Are you sure you want to delete this employee?')">Delete</button> 
                            <form id="delete-form-{{ $employee->id }}" action="/employees/{{ $employee->id }}" method="POST" style="display:none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @endif
        
</x-layout>