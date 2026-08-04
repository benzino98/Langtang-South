<x-admin-layout>
    <x-slot name="header">
        <h1 class="font-heading text-xl font-bold text-gray-900">Edit User</h1>
    </x-slot>

    <div class="max-w-4xl mx-auto bg-white rounded-xl shadow-sm p-6 sm:p-10">
        <form action="{{ route('admin.users.update', $user) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <x-form-input name="name" label="Full Name" :value="old('name', $user->name)" required />

            <x-form-input name="email" type="email" label="Email Address" :value="old('email', $user->email)" required />

            <x-form-input name="password" type="password" label="New Password (leave blank to keep current)" />

            <x-form-input name="password_confirmation" type="password" label="Confirm New Password" />

            <x-form-select name="role" label="Role" :options="['admin' => 'Admin', 'editor' => 'Editor']" :selected="old('role', $user->role)" required />


            <div class="flex items-center justify-between pt-6 border-t">
                <div>
                    @if ($user->id !== auth()->id())
                        <button type="button" class="text-red-600 hover:underline text-sm font-medium" onclick="document.getElementById('delete-form').submit();">
                            Delete User
                        </button>
                    @endif
                </div>
                <div class="flex items-center space-x-4">
                    <a href="{{ route('admin.users.index') }}" class="btn-secondary">
                        Cancel
                    </a>
                    <button type="submit" class="btn-primary">
                        Update User
                    </button>
                </div>
            </div>
        </form>

        @if ($user->id !== auth()->id())
            <form action="{{ route('admin.users.destroy', $user) }}" method="POST" id="delete-form" class="hidden">
                @csrf
                @method('DELETE')
            </form>
        @endif
    </div>
</x-admin-layout>
