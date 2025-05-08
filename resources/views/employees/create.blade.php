<x-layout>
    <x-slot:heading>
        Add a new employee
    </x-slot:heading>

    <form method="POST" action="/employees">
        @csrf

    <div class="space-y-12">
        <div class="border-b border-gray-900/10 pb-12">
        <h2 class="text-base/7 font-semibold text-gray-900">Add a New Employee</h2>
        <p class="mt-1 text-sm/6 text-gray-600">Please add the needed details about the employee you are adding to the form below.</p>

        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <x-form-field>
            <x-form-label for="first_name">Employee First Name</x-form-label>
            <div class="mt-2">
                <x-form-input name="first_name" id="first_name" placeholder="First Name..." required />

                <x-form-error name="first_name" />
            </div>
            </x-form-field>
        </div>

        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <x-form-field>
            <x-form-label for="first_name">Employee Last Name</x-form-label>
            <div class="mt-2">
                <x-form-input name="last_name" id="last_name" placeholder="Last Name..." required />

                <x-form-error name="last_name" />
            </div>
            </x-form-field>
        </div>

        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <x-form-field>
                <x-form-label for="company">Employee Company ID</x-form-label>
                <div class="mt-2">
                    <select name="company" id="company" required
                        class="block w-full min-w-0 grow py-1.5 pr-3 border border-black px-3 text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6">
                        <option value="" disabled selected>Select a company...</option>
                        @foreach ($companies as $company)
                            <option value="{{ $company->id }}"
                                {{ old('company') == $company->id ? 'selected' : '' }}>
                                {{ $company->name }} (ID: {{ $company->id }})
                            </option>
                        @endforeach
                    </select>

                    <x-form-error name="company" />
                </div>
            </x-form-field>
        </div>

        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <x-form-field>
            <x-form-label for="Salary">Employee Email</x-form-label>
            <div class="mt-2">
                <x-form-input name="email" id="email" placeholder="Employee Email..." required />

                <x-form-error name="email" />
            </div>
            </x-form-field>
        </div>

        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <x-form-field>
            <x-form-label for="Salary">Employee Phone Number</x-form-label>
            <div class="mt-2">
                <x-form-input name="phone_number" id="phone_number" placeholder="Employee Phone Number..." required />

                <x-form-error name="phone_number" />
            </div>
            </x-form-field>
        </div>
    </div>
    </div>

  <div class="mt-6 flex items-center justify-end gap-x-6">
    <x-button href="/employees">Cancel</x-button> 
    <x-form-button>Save</x-form-button>
  </div>
</form>

</x-layout>