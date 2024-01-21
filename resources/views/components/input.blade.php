@if ($type == 'button')
<tr>
    <td colspan="3"><button>{{ $label }}</button></td>
</tr>
@else
<tr>
    <td>{{ $label }}</td>
    <td>:</td>
    <td>        
    @if ($type == 'text')
        <input type="text" name="{{ $name }}" id="{{ $name }}" placeholder="{{ $placeholder }}" autocomplete="off" value="{{ old($name, $value) }}">
    @elseif ($type == 'select')
        <select name="{{ $name }}" id="{{ $name }}">
            <option value="{{ old('', $value) }}">{{ $value ? $value : $placeholder }}</option>
            {{ $slot }}
        </select>
    @endif
    </td>
</tr>
@endif