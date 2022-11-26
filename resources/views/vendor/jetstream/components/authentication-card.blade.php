<div id="particles-js" class="relative bg-gray-100 min-h-screen">
    <div class="absolute w-1/3 left-1/3 justify-center min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
        <div>
            {{ $logo }}
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-xl overflow-hidden sm:rounded-lg">
            {{ $slot }}
        </div>
    </div>
</div>

