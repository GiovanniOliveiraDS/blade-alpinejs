@props(['label' => null, 'error' => false])

<label {{ $attributes->class([
    'block text-sm font-medium',
    'text-gray-700' => !$error,
    'text-red-600'  =>  $error,
]) }}>
    {{ $label ?? $slot }}
</label>
