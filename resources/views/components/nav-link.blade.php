@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 mt-3 border-b-4 rounded-lg font-extrabold h-10 border-sky-500 text-sm font-medium leading-5 focus:outline-none focus:border-sky-500 transition duration-300 ease-in-out'
            : 'inline-flex items-center px-1 mt-3 border-b-2 h-10 rounded border-transparent text-sm font-medium leading-5 hover:border-gray-300 focus:outline-none focus:text-gray-300 focus:border-gray-300 transition duration-300 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
