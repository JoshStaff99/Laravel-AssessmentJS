<x-layout>
    <x-slot:heading>
        Employees Listings
    </x-slot:heading>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        @foreach ($employees as $employee)
            <div class="block px-4 py-6 border border-gray-200 rounded-lg hover:border-blue-800 group transition-colors duration-300">
                <div>
                    <h2 class="font-bold text-lg mb-5">Employee Name: {{ $employee->first_name }} {{ $employee->last_name }}</h2>
                    <h2 class="font-bold text-lg mb-5">Employee Email: {{ $employee->email }}</h2>
                    <h2 class="font-bold text-lg mb-5">Employee Phone Number: {{ $employee->phone_number }}</h2>

                    <div class="mt-6 flex items-center justify-between gap-x-6">
                    <div>
                        <x-button href="/employees/{{ $employee->id }}">View Employee Details</x-button> 
                    </div>

                    <div class="flex items-center gap-x-6">
                        <p class="">
                            <x-button href="/employees/{{ $employee->id }}/edit">Edit</x-button> 
                        </p>

                        <div class="flex items-center">
                            <button form="delete-form-{{ $employee->id }}" class="text-red-500 text-sm font-bold" onclick="return confirm('Are you sure you want to delete this employee?')">Delete</button>
                        </div>
                    </div>
                </div>

                <form method="POST" action="/employees/{{ $employee->id }}" id="delete-form-{{ $employee->id }}" class="hidden">
                    @csrf
                    @method('DELETE')
                </form>
                </div>
            </div>
        @endforeach
    </div>
    <div class="mt-10">
        {{ $employees->links() }}
    </div>
</x-layout>