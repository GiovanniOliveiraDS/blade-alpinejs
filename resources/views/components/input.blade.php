@props(['label' => null, 'hint' => null])

@php
    $name     = $attributes->get('name', $attributes->wire('model')->value());
    $id       = $attributes->get('id', md5($name));
    $hasError = $name && $errors->has($name);
@endphp

<div>
    @if ($label)
        <x-label :for="$id" :label="$label" :error="$hasError" class="mb-1" />
    @endif

    <input {{ $attributes->merge(['type' => 'text', 'id' => $id])->class([
        'shadow-sm block w-full sm:text-sm rounded-md',
        'border-gray-300 focus:ring-indigo-500 focus:border-indigo-500' => !$hasError,
        'border-red-300 text-red-600 focus:ring-red-500 focus:border-red-500 placeholder:text-red-400' =>  $hasError,
    ]) }}>

    @error($name)
        <x-label :for="$name" :label="$message" error />
    @enderror

    @if ($hint && !$hasError)
        <p @class([
            'mt-2 text-sm',
            'text-gray-500' => !$hasError,
            'text-red-500'  =>  $hasError
        ])>
            {{ $hint }}
        </p>
    @endif
</div>
