{{--
    Form Select Component

    A styled select dropdown with label and error handling.

    @props
        - name (string): The select name attribute.
        - label (string, optional): The label text.
        - options (array): An associative array of value => label pairs.
        - selected (string, optional): The currently selected value.
        - placeholder (string, optional): Placeholder option text.
        - required (bool): Whether the field is required. Default: false.
--}}
@props([
    'name' => '',
    'label' => '',
    'options' => [],
    'selected' => '',
    'placeholder' => 'Select an option',
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

    <select
        name="{{ $name }}"
        id="{{ $name }}"
        {{ $required ? 'required' : '' }}
        {{ $attributes->merge(['class' => 'w-full rounded-lg border-gray-300 shadow-sm focus:border-primary-green focus:ring-primary-green text-sm transition-colors duration-200']) }}
    >
        @if($placeholder)
            <option value="">{{ $placeholder }}</option>
        @endif
        @foreach($options as $value => $label)
            <option value="{{ $value }}" {{ old($name, $selected) == $value ? 'selected' : '' }}>
                {{ $label }}
            </option>
        @endforeach
    </select>

    @error($name)
        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
    @enderror
</div>
