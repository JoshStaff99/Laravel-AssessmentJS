<x-layout>
    <x-slot:heading>
        Edit Employee details for: {{ $employee->first_name }} {{ $employee->last_name }}
    </x-slot:heading>

    <form method="POST" action="/employees/{{ $employee->id }}">
        @csrf
        @method('PATCH')

    <div class="space-y-12">
        <div class="border-b border-gray-900/10 pb-12">
            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-4">
                    <label for="title" class="block text-sm/6 font-medium text-gray-900">Employee First Name</label>
                    <div class="mt-2">
                        <div class="flex items-center rounded-md bg-white outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                            <input 
                            type="text" 
                            name="first_name" 
                            id="first_name" 
                            class="block min-w-0 grow py-1.5 pr-3 px-3 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" 
                            placeholder="{{ $employee->first_name }}"
                            value="{{ $employee->first_name }}"
                            required>
                        </div>

                        @error('first_name')
                            <p class="text-xs text-red-500 font-semibold mt-1">{{ $message }}</p>
                        @enderror
                    </div>
            </div>
        </div>

        <div class="border-b border-gray-900/10 pb-12">
            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-4">
                    <label for="title" class="block text-sm/6 font-medium text-gray-900">Employee Last Name</label>
                    <div class="mt-2">
                        <div class="flex items-center rounded-md bg-white outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                            <input 
                            type="text" 
                            name="last_name" 
                            id="last_name" 
                            class="block min-w-0 grow py-1.5 pr-3 px-3 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" 
                            placeholder="{{ $employee->last_name }}"
                            value="{{ $employee->last_name }}"
                            required>
                        </div>

                        @error('last_name')
                            <p class="text-xs text-red-500 font-semibold mt-1">{{ $message }}</p>
                        @enderror
                    </div>
            </div>
        </div>

        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <div class="sm:col-span-4">
            <label for="salary" class="block text-sm/6 font-medium text-gray-900">Company ID</label>
            <div class="mt-2">
                <div class="flex items-center rounded-md bg-white outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                <input 
                type="integer" 
                name="company" 
                id="company" 
                class="block min-w-0 grow py-1.5 pr-3 px-3 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" 
                placeholder="{{ $employee->company }}" 
                value="{{ $employee->company }}"
                required>
                </div>

                
                @error('company')
                    <p class="text-xs text-red-500 font-semibold mt-1">{{ $message }}</p>
                @enderror
            </div>
            </div>
        </div>

        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <div class="sm:col-span-4">
            <label for="salary" class="block text-sm/6 font-medium text-gray-900">Employee Email</label>
            <div class="mt-2">
                <div class="flex items-center rounded-md bg-white outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                <input 
                type="text" 
                name="email" 
                id="email" 
                class="block min-w-0 grow py-1.5 pr-3 px-3 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" 
                placeholder="{{ $employee->email }}" 
                value="{{ $employee->email }}"
                required>
                </div>

                
                @error('email')
                    <p class="text-xs text-red-500 font-semibold mt-1">{{ $message }}</p>
                @enderror
            </div>
            </div>
        </div>

        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <div class="sm:col-span-4">
            <label for="salary" class="block text-sm/6 font-medium text-gray-900">Employee Phone Number</label>
            <div class="mt-2">
                <div class="flex items-center rounded-md bg-white outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                <input 
                type="int" 
                name="phone_number" 
                id="phone_number" 
                class="block min-w-0 grow py-1.5 pr-3 px-3 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" 
                placeholder="{{ $employee->phone_number }}" 
                value="{{ $employee->phone_number }}"
                required>
                </div>

                
                @error('email')
                    <p class="text-xs text-red-500 font-semibold mt-1">{{ $message }}</p>
                @enderror
            </div>
            </div>
        </div>
    </div>




    <div class="mt-6 flex items-center justify-between gap-x-6">
        <div class="flex items-center">
            <button form="delete-form" class="text-red-500 text-sm font-bold">Delete</button>
        </div>

        <div class="flex items-center gap-x-6">
            <a href="/employees/{{ $employee->id }}" class="text-sm/6 font-semibold text-gray-900">Cancel</a>

            <div>
                <button type="submit" 
                class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                Update</button>
            </div>
        </div>
    </div>
    </form>

    <form method="POST" action="/employees/{{ $employee->id }}" id="delete-form" class="hidden">
        @csrf
        @method('DELETE')
    </form>
</x-layout>