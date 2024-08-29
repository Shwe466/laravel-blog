@props(['options', 'multiple' => false, 'selected' => []])

<select {{ $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm']) }} {{ $multiple ? 'multiple' : '' }}>
    @foreach ($options as $value => $label)
        <option value="{{ $value }}" {{ in_array($value, $selected) ? 'selected' : '' }}>
            {{ $label }}
        </option>
    @endforeach
</select>