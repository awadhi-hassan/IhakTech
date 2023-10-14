@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block w-full pl-3 pr-4 mt-1 sm:mt-2 py-1 sm:py-2 border-l-8 border-amber-500 text-left text-base rounded-md font-medium text-white dark:text-white bg-sky-500 focus:outline-none focus:text-indigo-800 focus:bg-indigo-100 focus:border-indigo-700 transition duration-150 ease-in-out'
            : 'block w-full pl-3 pr-4 mt-1 sm:mt-2 py-1 sm:py-2 border-l-4 border-transparent text-left text-base font-medium dark:text-white hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
