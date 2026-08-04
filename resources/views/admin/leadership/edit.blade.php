<x-admin-layout>
    <x-slot name="header">
        <h1 class="font-heading text-xl font-bold text-gray-900">Edit Leadership Member</h1>
    </x-slot>

    <div class="max-w-4xl mx-auto bg-white rounded-xl shadow-sm p-6 sm:p-10">
        <form action="{{ route('admin.leadership.update', $leadership) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <x-form-input name="name" label="Full Name" :value="old('name', $leadership->name)" required />

            <x-form-input name="position" label="Position / Title" :value="old('position', $leadership->position)" required />

            <x-form-textarea name="bio" label="Biography" rows="8" :value="old('bio', $leadership->bio)" />

            <x-form-input name="display_order" type="number" label="Display Order" :value="old('display_order', $leadership->display_order)" required />

            <div>
                <label for="profile_image" class="block text-sm font-medium text-gray-700">Profile Image</label>
                <div class="mt-1 flex items-center">
                    <input type="file" name="profile_image" id="profile_image" class="w-full">
                </div>
                @if ($leadership->profile_image)
                    <div class="mt-4">
                        <img src="{{ asset('storage/' . $leadership->profile_image) }}" alt="{{ $leadership->name }}" class="w-32 h-32 rounded-full object-cover">
                    </div>
                @endif
                @error('profile_image')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>


            <div class="flex items-center justify-between pt-6 border-t">
                <div>
                    <button type="button" class="text-red-600 hover:underline text-sm font-medium" onclick="document.getElementById('delete-form').submit();">
                        Delete Member
                    </button>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="{{ route('admin.leadership.index') }}" class="btn-secondary">
                        Cancel
                    </a>
                    <button type="submit" class="btn-primary">
                        Update Member
                    </button>
                </div>
            </div>
        </form>

        <form action="{{ route('admin.leadership.destroy', $leadership) }}" method="POST" id="delete-form" class="hidden">
            @csrf
            @method('DELETE')
        </form>
    </div>
</x-admin-layout>
