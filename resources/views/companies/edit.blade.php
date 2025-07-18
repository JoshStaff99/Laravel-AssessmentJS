<x-layout>
    <x-slot:heading>
        Edit Company details for: {{ $company->name }}
    </x-slot:heading>

    <form method="POST" action="/companies/{{ $company->id }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

    <div class="space-y-12">
        <div class="border-b border-gray-900/10 pb-12">
            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-4">
                    <label for="title" class="block text-sm/6 font-medium text-gray-900">Company Name</label>
                    <div class="mt-2">
                        <div class="flex items-center rounded-md bg-white outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                            <input 
                            type="text" 
                            name="name" 
                            id="name" 
                            class="block min-w-0 grow py-1.5 pr-3 border border-black px-3 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" 
                            placeholder="{{ $company->name }}"
                            value="{{ $company->name }}"
                            required>
                        </div>

                        @error('name')
                            <p class="text-xs text-red-500 font-semibold mt-1">{{ $message }}</p>
                        @enderror
                    </div>
            </div>
        </div>

        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <div class="sm:col-span-4">
            <label for="email" class="block text-sm/6 font-medium text-gray-900">Company Email</label>
            <div class="mt-2">
                <div class="flex items-center rounded-md bg-white outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                <input 
                type="text" 
                name="email" 
                id="email" 
                class="block min-w-0 grow py-1.5 pr-3 border border-black px-3 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" 
                placeholder="{{ $company->email }}" 
                value="{{ $company->email }}"
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
            <label for="logo" class="block text-sm/6 font-medium text-gray-900">Company Logo</label>
            <div class="mt-2">
                <div class="flex items-center rounded-md bg-white outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                <input 
                type="file" 
                name="logo" 
                id="logo" 
                class="block min-w-0 grow border border-black py-1.5 pr-3 px-3 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" 
                placeholder="{{ $company->logo }}" 
                value="{{ $company->logo }}">
                </div>

                
                @error('logo')
                    <p class="text-xs text-red-500 font-semibold mt-1">{{ $message }}</p>
                @enderror
            </div>
            </div>
        </div>

        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <div class="sm:col-span-4">
            <label for="website" class="block text-sm/6 font-medium text-gray-900">Company Website</label>
            <div class="mt-2">
                <div class="flex items-center rounded-md bg-white outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                <input 
                type="text" 
                name="website" 
                id="website" 
                class="block min-w-0 grow py-1.5 pr-3 border border-black px-3 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" 
                placeholder="{{ $company->website }}" 
                value="{{ $company->website }}"
                required>
                </div>

                
                @error('website')
                    <p class="text-xs text-red-500 font-semibold mt-1">{{ $message }}</p>
                @enderror
            </div>
            </div>
        </div>
    </div>
    </div>




    <div class="mt-6 flex items-center justify-between gap-x-6">
        <div class="flex items-center">
            <button form="delete-form" class="text-red-500 text-sm font-bold">Delete</button>
        </div>

        <div class="flex items-center gap-x-6">
            <a href="/companies/{{ $company->id }}" class="text-sm/6 font-semibold text-gray-900">Cancel</a>

            <div>
                <button type="submit" 
                class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                Update</button>
            </div>
        </div>
    </div>
    </form>

    <form method="POST" action="/companies/{{ $company->id }}" id="delete-form" class="hidden">
        @csrf
        @method('DELETE')
    </form>
</x-layout>