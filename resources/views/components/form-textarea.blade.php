{{--
    Form Textarea Component

    A styled textarea with label and error handling.

    @props
        - name (string): The textarea name attribute.
        - label (string, optional): The label text.
        - value (string, optional): The textarea value.
        - placeholder (string, optional): Placeholder text.
        - rows (int): Number of visible rows. Default: 4.
        - required (bool): Whether the field is required. Default: false.
--}}
@props([
    'name' => '',
    'label' => '',
    'value' => '',
    'placeholder' => '',
    'rows' => 4,
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

    <textarea
        name="{{ $name }}"
        id="{{ $name }}"
        rows="{{ $rows }}"
        placeholder="{{ $placeholder }}"
        {{ $required ? 'required' : '' }}
        {{ $attributes->merge(['class' => 'w-full rounded-lg border-gray-300 shadow-sm focus:border-primary-green focus:ring-primary-green text-sm transition-colors duration-200']) }}
    >{{ old($name, $value) }}</textarea>

    @error($name)
        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
    @enderror
</div>
