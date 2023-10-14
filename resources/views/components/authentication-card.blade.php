<div id="particles-js" class="h-screen flex flex-col items-center justify-center pt-6 sm:pt-0 bg-gray-50 dark:bg-black">

    @if (request()->route()->getName() === 'register')
        <div class="absolute top-12">
            {{ $logo }}
        </div>
    @else
        <div class="absolute top-24">
            {{ $logo }}
        </div>
    @endif

    <div class="absolute rounded-md w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-900/95 shadow-md overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>
</div>
