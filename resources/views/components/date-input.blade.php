@props(['disabled' => false, 'name', 'value' => null])

<input type="date" name="{{ $name }}" value="{{ $value }}" @disabled($disabled) {{ $attributes->merge(['class'
=>'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm']) }}>