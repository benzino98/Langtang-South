@props(['name', 'label', 'checked' => false])

<div class="flex items-center">
    <input
        type="checkbox"
        name="{{ $name }}"
        id="{{ $name }}"
        value="1"
        {{ old($name, $checked) ? 'checked' : '' }}
        {{ $attributes->merge(['class' => 'rounded h-4 w-4 text-primary-green border-gray-300 focus:ring-primary-green']) }}
    >
    <label for="{{ $name }}" class="ml-2 block text-sm text-gray-900">
        {{ $label }}
    </label>
</div>
@error($name)
    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
@enderror
