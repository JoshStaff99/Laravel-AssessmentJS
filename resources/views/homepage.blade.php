<x-layout>
    <x-slot:heading>
        Home Page
    </x-slot:heading>
    
    <div class="max-w-7xl mx-auto py-10 px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Companies Card -->
            <div class="bg-white shadow rounded-lg p-6 flex flex-col items-center">
                <div class="bg-blue-100 text-blue-600 rounded-full p-3 mb-4">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V7M16 3v4M8 3v4m-5 4h18"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold mb-2">Companies: {{ \App\Models\Company::count() }}</h3>
                <p class="text-gray-500 mb-4 text-center">Manage all registered companies in the system.</p>
                <a href="/companies" class="inline-block mt-2 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">View Companies</a>
            </div>
            <!-- Employees Card -->
            <div class="bg-white shadow rounded-lg p-6 flex flex-col items-center">
                <div class="bg-green-100 text-green-600 rounded-full p-3 mb-4">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87M16 3.13a4 4 0 010 7.75M8 3.13a4 4 0 000 7.75"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold mb-2">Employees: {{ \App\Models\Employee::count() }}</h3>
                <p class="text-gray-500 mb-4 text-center">View and manage employee records.</p>
                <a href="/employees" class="inline-block mt-2 px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition">View Employees</a>
            </div>
        </div>
        
        <div class="mt-10 grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Recent Companies -->
            <div class="bg-white shadow rounded-lg p-6">
                <h4 class="text-md font-semibold mb-4">5 Most Recent Companies</h4>
                <ul class="text-gray-700">
                    @foreach (\App\Models\Company::latest()->take(5)->get() as $company)
                        <li class="mb-2 flex items-center justify-between">
                            <div>
                                <a href="/companies/{{ $company->id }}" class="text-blue-600 hover:underline font-medium">
                                    {{ $company->name }}
                                </a>
                                <span class="text-gray-400 text-xs">({{ $company->created_at->format('Y-m-d') }})</span>
                            </div>
                            <div class="flex gap-2">
                                <a href="/companies/{{ $company->id }}" class="px-2 py-1 text-xs bg-blue-100 text-blue-700 rounded hover:bg-blue-200">View</a>
                                <a href="/companies/{{ $company->id }}/edit" class="px-2 py-1 text-xs bg-yellow-100 text-yellow-700 rounded hover:bg-yellow-200">Edit</a>
                                <form action="/companies/{{ $company->id }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this company?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-2 py-1 text-xs bg-red-100 text-red-700 rounded hover:bg-red-200">Delete</button>
                                </form>
                            </div>
                        </li>
                    @endforeach
                </ul>
                <a href="/companies/create" class="inline-block mt-4 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">Add a Company</a>
            </div>
            <!-- Recent Employees -->
            <div class="bg-white shadow rounded-lg p-6">
                <h4 class="text-md font-semibold mb-4">5 Most Recent Employees</h4>
                <ul class="text-gray-700">
                    @foreach (\App\Models\Employee::latest()->take(5)->get() as $employee)
                        <li class="mb-2 flex items-center justify-between">
                            <div>
                                <a href="/employees/{{ $employee->id }}" class="text-green-600 hover:underline font-medium">
                                    {{ $employee->first_name }} {{ $employee->last_name }}
                                </a>
                                <span class="text-gray-400 text-xs">({{ $employee->created_at->format('Y-m-d') }})</span>
                            </div>
                            <div class="flex gap-2">
                                <a href="/employees/{{ $employee->id }}" class="px-2 py-1 text-xs bg-green-100 text-green-700 rounded hover:bg-green-200">View</a>
                                <a href="/employees/{{ $employee->id }}/edit" class="px-2 py-1 text-xs bg-yellow-100 text-yellow-700 rounded hover:bg-yellow-200">Edit</a>
                                <form action="/employees/{{ $employee->id }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this employee?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-2 py-1 text-xs bg-red-100 text-red-700 rounded hover:bg-red-200">Delete</button>
                                </form>
                            </div>
                        </li>
                    @endforeach
                </ul>
                <a href="/employees/create" class="inline-block mt-4 px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition">Add an Employee</a>
            </div>
        </div>
    </div>
    
</x-layout>