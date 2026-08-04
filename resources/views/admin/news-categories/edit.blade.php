<x-admin-layout>
    <x-slot name="header">
        <h1 class="font-heading text-xl font-bold text-gray-900">Edit Category</h1>
    </x-slot>

    <div class="max-w-4xl mx-auto bg-white rounded-xl shadow-sm p-6 sm:p-10">
        <form action="{{ route('admin.news-categories.update', $newsCategory) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <x-form-input name="name" label="Category Name" :value="old('name', $newsCategory->name)" required />

            <x-form-textarea name="description" label="Description" rows="4" :value="old('description', $newsCategory->description)" />


            <div class="flex items-center justify-between pt-6 border-t">
                <div>
                    <button type="button" class="text-red-600 hover:underline text-sm font-medium" onclick="document.getElementById('delete-form').submit();">
                        Delete Category
                    </button>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="{{ route('admin.news-categories.index') }}" class="btn-secondary">
                        Cancel
                    </a>
                    <button type="submit" class="btn-primary">
                        Update Category
                    </button>
                </div>
            </div>
        </form>

        <form action="{{ route('admin.news-categories.destroy', $newsCategory) }}" method="POST" id="delete-form" class="hidden">
            @csrf
            @method('DELETE')
        </form>
    </div>
</x-admin-layout>
