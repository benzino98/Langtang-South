<x-admin-layout>
    <x-slot name="header">
        <h1 class="font-heading text-xl font-bold text-gray-900">Edit Document</h1>
    </x-slot>

    <div class="max-w-4xl mx-auto bg-white rounded-xl shadow-sm p-6 sm:p-10">
        <form action="{{ route('admin.documents.update', $document) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <x-form-select name="document_category_id" label="Category" :options="$categories->pluck('name', 'id')" :selected="old('document_category_id', $document->document_category_id)" required />

            <x-form-input name="title" label="Document Title" :value="old('title', $document->title)" required />

            <x-form-textarea name="description" label="Description" rows="4" :value="old('description', $document->description)" />

            <div>
                <label for="file" class="block text-sm font-medium text-gray-700">Replace File (PDF, DOC, XLS, PPT, Image)</label>
                <div class="mt-1 flex items-center">
                    <input type="file" name="file" id="file" class="w-full">
                </div>
                @if ($document->file_path)
                    <div class="mt-4">
                        <a href="{{ asset('storage/' . $document->file_path) }}" target="_blank" class="text-sm font-medium text-blue-600 hover:underline">
                            View current file ({{ strtoupper($document->file_type) }}, {{ number_format($document->file_size / 1024, 1) }} KB)
                        </a>
                    </div>
                @endif
                @error('file')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <x-form-checkbox name="is_published" label="Published" :checked="old('is_published', $document->is_published)" />


            <div class="flex items-center justify-between pt-6 border-t">
                <div>
                    <button type="button" class="text-red-600 hover:underline text-sm font-medium" onclick="document.getElementById('delete-form').submit();">
                        Delete Document
                    </button>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="{{ route('admin.documents.index') }}" class="btn-secondary">
                        Cancel
                    </a>
                    <button type="submit" class="btn-primary">
                        Update Document
                    </button>
                </div>
            </div>
        </form>

        <form action="{{ route('admin.documents.destroy', $document) }}" method="POST" id="delete-form" class="hidden">
            @csrf
            @method('DELETE')
        </form>
    </div>
</x-admin-layout>
