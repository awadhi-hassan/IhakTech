@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-2 pt-1 bg-sky-700 rounded-full border-2 border-sky-700 sm:text-xs md:text-xs lg:text-sm font-medium leading-5 text-white font-bold focus:outline-none focus:border-indigo-700 transition ease-in-out delay-150 duration-500'
            : 'inline-flex items-center px-1 pt-1 sm:text-xs md:text-xs lg:text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition hover:font-bold ease-in-out duration-400';
            // : 'inline-flex items-center px-1 pt-1 sm:text-xs md:text-xs lg:text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition ease-in-out hover:scale-110 hover:font-bold duration-500';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
