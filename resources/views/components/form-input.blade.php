{{--
    Form Input Component

    A styled text input with label and error handling.

    @props
        - name (string): The input name attribute.
        - label (string, optional): The label text.
        - type (string): The input type. Default: 'text'.
        - value (string, optional): The input value.
        - placeholder (string, optional): Placeholder text.
        - required (bool): Whether the field is required. Default: false.
--}}
@props([
    'name' => '',
    'label' => '',
    'type' => 'text',
    'value' => '',
    'placeholder' => '',
    'required' => false,
])

<div>
    @if($label)
        <label for="{{ $name }}" class="block text-sm font-medium text-gray-700 mb-1">
            {{ $label }}
            @if($required)
                <span class="text-red-500">*</span>
            @endif
        </label>
    @endif

    <input
        type="{{ $type }}"
        name="{{ $name }}"
        id="{{ $name }}"
        value="{{ old($name, $value) }}"
        placeholder="{{ $placeholder }}"
        {{ $required ? 'required' : '' }}
        {{ $attributes->merge(['class' => 'w-full rounded-lg border-gray-300 shadow-sm focus:border-primary-green focus:ring-primary-green text-sm transition-colors duration-200']) }}
    >

    @error($name)
        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
    @enderror
</div>
