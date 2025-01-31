@props(['disabled' => false, 'name', 'enum', 'value' => null])

<select name="{{ $name }}" @disabled($disabled) {{ $attributes->merge(['class' => 'border-gray-300
    focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm']) }}>
    <option value="">Selecione</option>

    {{-- Verifica se $enum é uma string (nome da classe) --}}
    @if (is_string($enum))
    @foreach ($enum::cases() as $case)
    <option value="{{ $case->value }}" @selected($value==$case->value)>
        {{ $case->name }}
    </option>
    @endforeach

    {{-- Verifica se é uma instância de UnitEnum --}}
    @elseif (is_object($enum) && $enum instanceof UnitEnum)
    @foreach ($enum::cases() as $case)
    <option value="{{ $case->value }}" @selected($value==$case->value)>
        {{ $case->name }}
    </option>
    @endforeach
    @endif
</select>