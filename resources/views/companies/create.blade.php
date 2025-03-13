<x-layout>
    <x-slot:heading>
        Add a new company
    </x-slot:heading>

    <form method="POST" action="/companies">
        @csrf

    <div class="space-y-12">
        <div class="border-b border-gray-900/10 pb-12">
        <h2 class="text-base/7 font-semibold text-gray-900">Add a New Company</h2>
        <p class="mt-1 text-sm/6 text-gray-600">Please add the needed details about the company you are adding to the form below.</p>

        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <x-form-field>
            <x-form-label for="title">Company name</x-form-label>
            <div class="mt-2">
                <x-form-input name="name" id="name" placeholder="Company Name..." required />

                <x-form-error name="name" />
            </div>
            </x-form-field>
        </div>

        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <x-form-field>
            <x-form-label for="Salary">Company Email</x-form-label>
            <div class="mt-2">
                <x-form-input name="email" id="email" placeholder="Company Email..." required />

                <x-form-error name="email" />
            </div>
            </x-form-field>
        </div>

        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <x-form-field>
            <x-form-label for="Salary">Company Logo</x-form-label>
            <div class="mt-2">
                <x-form-input name="logo" id="logo" type="file" required />

                <x-form-error name="logo" />
            </div>
            </x-form-field>
        </div>

        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <x-form-field>
            <x-form-label for="Salary">Company Website</x-form-label>
            <div class="mt-2">
                <x-form-input name="website" id="website" placeholder="Company Website..." required />

                <x-form-error name="website" />
            </div>
            </x-form-field>
        </div>
    </div>
    </div>




  <div class="mt-6 flex items-center justify-end gap-x-6">
    <button type="button" class="text-sm/6 font-semibold text-gray-900">Cancel</button>
    <x-form-button>Save</x-form-button>
  </div>
</form>

</x-layout>