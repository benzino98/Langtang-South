<x-admin-layout>
    <x-slot name="header">
        <h1 class="font-heading text-xl font-bold text-gray-900">Edit Notice</h1>
    </x-slot>

    <div class="max-w-4xl mx-auto bg-white rounded-xl shadow-sm p-6 sm:p-10">
        <form action="{{ route('admin.public-notices.update', $publicNotice) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <x-form-input name="title" label="Notice Title" :value="old('title', $publicNotice->title)" required />

            <x-form-textarea name="description" label="Description" rows="8" :value="old('description', $publicNotice->description)" required />

            <div>
                <label for="attachment" class="block text-sm font-medium text-gray-700">Attachment (PDF, DOC, XLS, Image)</label>
                <div class="mt-1 flex items-center">
                    <input type="file" name="attachment" id="attachment" class="w-full">
                </div>
                @if ($publicNotice->attachment_path)
                    <div class="mt-4">
                        <a href="{{ asset('storage/' . $publicNotice->attachment_path) }}" target="_blank" class="text-sm font-medium text-blue-600 hover:underline">
                            View current attachment
                        </a>
                    </div>
                @endif
                @error('attachment')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <x-form-checkbox name="is_published" label="Published" :checked="old('is_published', $publicNotice->is_published)" />


            <div class="flex items-center justify-between pt-6 border-t">
                <div>
                    <button type="button" class="text-red-600 hover:underline text-sm font-medium" onclick="document.getElementById('delete-form').submit();">
                        Delete Notice
                    </button>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="{{ route('admin.public-notices.index') }}" class="btn-secondary">
                        Cancel
                    </a>
                    <button type="submit" class="btn-primary">
                        Update Notice
                    </button>
                </div>
            </div>
        </form>

        <form action="{{ route('admin.public-notices.destroy', $publicNotice) }}" method="POST" id="delete-form" class="hidden">
            @csrf
            @method('DELETE')
        </form>
    </div>
</x-admin-layout>
