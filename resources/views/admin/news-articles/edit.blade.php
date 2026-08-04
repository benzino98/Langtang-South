<x-admin-layout>
    <x-slot name="header">
        <h1 class="font-heading text-xl font-bold text-gray-900">Edit Article</h1>
    </x-slot>

    <div class="max-w-4xl mx-auto bg-white rounded-xl shadow-sm p-6 sm:p-10">
        <form action="{{ route('admin.news-articles.update', $newsArticle) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <x-form-input name="title" label="Article Title" :value="old('title', $newsArticle->title)" required />

            <x-form-select name="news_category_id" label="Category" :options="$categories->pluck('name', 'id')" :selected="old('news_category_id', $newsArticle->news_category_id)" required />

            <div>
                <label for="content" class="block text-sm font-medium text-gray-700">Content</label>
                <div class="mt-1">
                    <textarea name="content" id="content" rows="10" class="w-full ckeditor">{{ old('content', $newsArticle->content) }}</textarea>
                </div>
            </div>

            <div>
                <label for="featured_image" class="block text-sm font-medium text-gray-700">Featured Image</label>
                <div class="mt-1 flex items-center">
                    <input type="file" name="featured_image" id="featured_image" class="w-full">
                </div>
                @if ($newsArticle->featured_image)
                    <div class="mt-4">
                        <img src="{{ asset('storage/' . $newsArticle->featured_image) }}" alt="{{ $newsArticle->title }}" class="w-48 h-auto rounded-lg">
                    </div>
                @endif
                @error('featured_image')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <x-form-checkbox name="is_published" label="Published" :checked="old('is_published', $newsArticle->is_published)" />


            <div class="flex items-center justify-between pt-6 border-t">
                <div>
                    <button type="button" class="text-red-600 hover:underline text-sm font-medium" onclick="document.getElementById('delete-form').submit();">
                        Delete Article
                    </button>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="{{ route('admin.news-articles.index') }}" class="btn-secondary">
                        Cancel
                    </a>
                    <button type="submit" class="btn-primary">
                        Update Article
                    </button>
                </div>
            </div>
        </form>

        <form action="{{ route('admin.news-articles.destroy', $newsArticle) }}" method="POST" id="delete-form" class="hidden">
            @csrf
            @method('DELETE')
        </form>
    </div>
</x-admin-layout>
