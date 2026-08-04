<x-admin-layout>
    <x-slot name="header">
        <h1 class="font-heading text-xl font-bold text-gray-900">Add New User</h1>
    </x-slot>

    <div class="max-w-4xl mx-auto bg-white rounded-xl shadow-sm p-6 sm:p-10">
        <form action="{{ route('admin.users.store') }}" method="POST" class="space-y-6">
            @csrf

            <x-form-input name="name" label="Full Name" required />

            <x-form-input name="email" type="email" label="Email Address" required />

            <x-form-input name="password" type="password" label="Password" required />

            <x-form-input name="password_confirmation" type="password" label="Confirm Password" required />

            <x-form-select name="role" label="Role" :options="['admin' => 'Admin', 'editor' => 'Editor']" required />


            <div class="flex items-center justify-end space-x-4 pt-6 border-t">
                <a href="{{ route('admin.users.index') }}" class="btn-secondary">
                    Cancel
                </a>
                <button type="submit" class="btn-primary">
                    Create User
                </button>
            </div>
        </form>
    </div>
</x-admin-layout>
