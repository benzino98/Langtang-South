<x-admin-layout>
    <x-slot name="header">
        <h1 class="font-heading text-xl font-bold text-gray-900">Edit Album</h1>
    </x-slot>

    <div class="max-w-4xl mx-auto bg-white rounded-xl shadow-sm p-6 sm:p-10">
        <form action="{{ route('admin.gallery-albums.update', $galleryAlbum) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <x-form-input name="title" label="Album Title" :value="old('title', $galleryAlbum->title)" required />

            <x-form-textarea name="description" label="Description" rows="4" :value="old('description', $galleryAlbum->description)" />

            <div>
                <label for="cover_image" class="block text-sm font-medium text-gray-700">Cover Image</label>
                <div class="mt-1 flex items-center">
                    <input type="file" name="cover_image" id="cover_image" class="w-full">
                </div>
                @if ($galleryAlbum->cover_image)
                    <div class="mt-4">
                        <img src="{{ asset('storage/' . $galleryAlbum->cover_image) }}" alt="{{ $galleryAlbum->title }}" class="w-48 h-auto rounded-lg">
                    </div>
                @endif
                @error('cover_image')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Select Images</label>
                <p class="mt-1 text-xs text-gray-500">Click on images to select them for this album.</p>
                <div class="mt-2 grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-3 max-h-96 overflow-y-auto p-1" id="image-grid">
                    @php $albumImageIds = $galleryAlbum->images->pluck('id')->toArray(); @endphp
                    @foreach ($images as $image)
                        @php $isSelected = in_array($image->id, $albumImageIds); @endphp
                        <div class="relative cursor-pointer rounded-lg overflow-hidden border-2 transition-all duration-200 image-card {{ $isSelected ? 'border-primary-green ring-2 ring-primary-green/30' : 'border-gray-200 hover:border-primary-green-light' }}" data-image-card data-image-id="{{ $image->id }}">
                            <input type="checkbox" name="image_ids[]" value="{{ $image->id }}" class="hidden input-image-checkbox" {{ $isSelected ? 'checked' : '' }}>
                            <img src="{{ asset('storage/' . $image->image_path) }}" alt="{{ $image->caption ?? '' }}" class="w-full h-24 object-cover">
                            <div class="absolute inset-0 bg-primary-green/30 {{ $isSelected ? '' : 'opacity-0' }} transition-opacity duration-200 selected-overlay flex items-center justify-center">
                                <svg class="w-8 h-8 text-white drop-shadow-lg" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                        </div>
                    @endforeach
                </div>
                @error('image_ids')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
                @error('image_ids.*')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
                <div class="mt-3 flex items-center justify-between">
                    <span id="selection-counter" class="text-sm font-medium text-gray-600">{{ count($albumImageIds) }} images selected</span>
                    <button type="button" id="clear-selection" class="text-sm text-primary-green hover:underline font-medium">Clear all</button>
                </div>
            </div>

            <x-form-checkbox name="is_published" label="Published" :checked="old('is_published', $galleryAlbum->is_published)" />

            <div class="flex items-center justify-between pt-6 border-t">
                <div>
                    <button type="button" class="text-red-600 hover:underline text-sm font-medium" onclick="document.getElementById('delete-form').submit();">
                        Delete Album
                    </button>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="{{ route('admin.gallery-albums.index') }}" class="btn-secondary">
                        Cancel
                    </a>
                    <button type="submit" class="btn-primary">
                        Update Album
                    </button>
                </div>
            </div>
        </form>

        <form action="{{ route('admin.gallery-albums.destroy', $galleryAlbum) }}" method="POST" id="delete-form" class="hidden">
            @csrf
            @method('DELETE')
        </form>
    </div>
</x-admin-layout>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    var imageGrid = document.getElementById('image-grid');
    var selectionCounter = document.getElementById('selection-counter');
    var clearSelectionBtn = document.getElementById('clear-selection');

    function updateSelectionCounter() {
        var checkedCount = document.querySelectorAll('.input-image-checkbox:checked').length;
        selectionCounter.textContent = checkedCount + ' image' + (checkedCount !== 1 ? 's' : '') + ' selected';
    }

    function toggleCard(card) {
        var checkbox = card.querySelector('.input-image-checkbox');
        if (!checkbox) return;

        checkbox.checked = !checkbox.checked;

        var overlay = card.querySelector('.selected-overlay');
        if (checkbox.checked) {
            card.classList.remove('border-gray-200');
            card.classList.add('border-primary-green', 'ring-2', 'ring-primary-green/30');
            if (overlay) overlay.classList.remove('opacity-0');
        } else {
            card.classList.add('border-gray-200');
            card.classList.remove('border-primary-green', 'ring-2', 'ring-primary-green/30');
            if (overlay) overlay.classList.add('opacity-0');
        }

        updateSelectionCounter();
    }

    // Handle click on each image card
    imageGrid.addEventListener('click', function(e) {
        var card = e.target.closest('[data-image-card]');
        if (card) {
            e.preventDefault();
            toggleCard(card);
        }
    });

    // Clear selection button
    clearSelectionBtn.addEventListener('click', function() {
        document.querySelectorAll('.input-image-checkbox').forEach(function(checkbox) {
            checkbox.checked = false;
            var card = checkbox.closest('[data-image-card]');
            if (card) {
                card.classList.add('border-gray-200');
                card.classList.remove('border-primary-green', 'ring-2', 'ring-primary-green/30');
                var overlay = card.querySelector('.selected-overlay');
                if (overlay) overlay.classList.add('opacity-0');
            }
        });
        updateSelectionCounter();
    });

    updateSelectionCounter();
});
</script>
@endpush
