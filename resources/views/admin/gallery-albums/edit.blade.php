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
                @endif
            </div>

            <div>
                <label for="images" class="block text-sm font-medium text-gray-700">Select Images</label>
                <p class="mt-1 text-xs text-gray-500">Choose multiple images from the gallery to add to this album.</p>
                <div class="mt-2 grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-3 max-h-80 overflow-y-auto" id="image-grid">
                    @foreach ($images as $image)
                        <label class="relative cursor-pointer image-card" data-image-card data-image-id="{{ $image->id }}">
                            <input type="checkbox" name="image_ids[]" value="{{ $image->id }}" class="sr-only peer input-image-checkbox" {{ in_array($image->id, $galleryAlbum->images->pluck('id')->toArray()) ? 'checked' : '' }}>
                            <div class="relative rounded-lg overflow-hidden border border-primary-green-light transition-colors duration-200 select-image-bg" style="background-image: url('{{ asset('storage/' . $image->image_path) }}'); background-size: cover; background-position: center;">
                                <span class="absolute bottom-0 left-0 right-0 bg-black/60 text-white text-xs px-1 py-0.5 opacity-0 selected-checkmark">✓</span>
                            </div>
                            <span class="absolute bottom-0 left-0 right-0 bg-black/60 text-white text-xs px-1 py-0.5 opacity-0">+ Add</span>
                        </label>
                    @endforeach
                </div>
                @error('image_ids.*')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @endif
                <div class="mt-4 flex items-center justify-end">
                    <span id="selection-counter" class="text-sm text-gray-600">{{ $galleryAlbum->images->count() }} images selected</span>
                    <button type="button" id="clear-selection" class="ml-2 text-primary-green hover:underline text-sm font-medium">Clear selection</button>
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
    const imageGrid = document.getElementById('image-grid');
    const selectionCounter = document.getElementById('selection-counter');
    const clearSelectionBtn = document.getElementById('clear-selection');
    const imageCards = document.querySelectorAll('[data-image-card]');

    function updateSelectionCounter() {
        const checkedCount = document.querySelectorAll('input[name="image_ids[]"]:checked').length;
        selectionCounter.textContent = `${checkedCount} image${checkedCount !== 1 ? 's' : ''} selected`;
    }

    function updateCardVisual(card, isChecked) {
        const bgDiv = card.querySelector('.select-image-bg');
        const checkmark = card.querySelector('.selected-checkmark');
        const addLabel = card.querySelector('span:not(.selected-checkmark)');

        if (isChecked) {
            card.classList.add('ring-2', 'ring-primary-green', 'border-primary-green-dark');
            bgDiv.classList.add('opacity-100');
            checkmark.classList.remove('opacity-0');
            checkmark.classList.add('opacity-100');
            if (addLabel) addLabel.classList.add('opacity-100');
        } else {
            card.classList.remove('ring-2', 'ring-primary-green', 'border-primary-green-dark');
            bgDiv.classList.remove('opacity-100');
            checkmark.classList.add('opacity-0');
            checkmark.classList.remove('opacity-100');
            if (addLabel) addLabel.classList.remove('opacity-100');
        }
    }

    // Handle checkbox changes
    imageGrid.addEventListener('change', function(e) {
        if (e.target.matches('input[name="image_ids[]"]')) {
            const card = e.target.closest('[data-image-card]');
            if (card) {
                updateCardVisual(card, e.target.checked);
            }
            updateSelectionCounter();
        }
    });

    // Also handle click on the label/card for better UX
    imageCards.forEach(card => {
        card.addEventListener('click', function(e) {
            // Don't double-handle if clicking the checkbox directly
            if (e.target.type === 'checkbox') return;

            const checkbox = card.querySelector('input[name="image_ids[]"]');
            if (checkbox) {
                checkbox.checked = !checkbox.checked;
                checkbox.dispatchEvent(new Event('change', { bubbles: true }));
            }
        });
    });

    // Clear selection button
    clearSelectionBtn.addEventListener('click', function() {
        document.querySelectorAll('input[name="image_ids[]"]').forEach(checkbox => {
            checkbox.checked = false;
            const card = checkbox.closest('[data-image-card]');
            if (card) {
                updateCardVisual(card, false);
            }
        });
        updateSelectionCounter();
    });

    // Initialize visual state for any pre-checked boxes (e.g., after validation error)
    document.querySelectorAll('input[name="image_ids[]"]:checked').forEach(checkbox => {
        const card = checkbox.closest('[data-image-card]');
        if (card) {
            updateCardVisual(card, true);
        }
    });
    updateSelectionCounter();
});
</script>
@endpush
