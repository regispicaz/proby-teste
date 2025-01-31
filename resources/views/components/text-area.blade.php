@props(['disabled' => false, 'name', 'value' => '', 'rows' => 3])

<textarea name="{{ $name }}" rows="{{ $rows }}" @disabled($disabled) {{ $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm']) }}
>{{ $value }}</textarea>