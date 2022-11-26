@php
    $slideshow_pics = scandir("/home/kali/Desktop/Projects/IhakTech/storage/app/public/web_pics/slideshow");
    $partners = scandir("/home/kali/Desktop/Projects/IhakTech/storage/app/public/partners");
@endphp

<!-- Theme change toggle button! -->
<div class="py-2 flex items-center justify-center my-2">
    <h2 class="text-black px-2 max-[639px]:text-xs max-[639px]:font-bold sm:text-base sm:font-bold">LIGHT</h2>
    <label class="switch">
        <input type="checkbox">
        <span class="slider round"></span>
    </label>
    <h2 class="text-black px-2 max-[639px]:text-xs max-[639px]:font-bold sm:text-base sm:font-bold">DARK</h2>
</div>

<div class="p-6 sm:px-20 bg-white border-b border-gray-200">
    <div class="items-center flex max-[639px]:flex-col-reverse">
        <div id="hero_text" class="min-[1240px]:w-1/2">
            <h1 class="font-extrabold text-slate-900 sm:text-lg md:text-2xl lg:text-3xl xl:text-4xl 2xl:text-5xl text-center">All of your IT needs in one place.</h1>
            <h1 class="my-5 sm:text-sm md:text-base lg:text-lg xl:text-xl">Are you looking for anything ranging from Graphics Design, Web Design, Web Development, Networking to Computer Accessories among other online solutions, contact us today to get your hands on quality equipments and services.</h1>
            <div class="flex my-4">
                <x-jet-button class="hover:bg-amber-600 hover:text-white">Get Started</x-jet-button>
                <x-jet-button class="text-black bg-amber-600 ml-4 hover:bg-sky-700 hover:text-white">Inquiry</x-jet-button>
            </div>
        </div>

        <!-- Slideshow images on hero section -->
        <div class="slideshow">
            @foreach ($slideshow_pics as $slideshow_pic )
                @if (strlen($slideshow_pic > 2))
                    <img id="slideshow_img" class="m-3" src="{{ asset("storage/web_pics/slideshow/$slideshow_pic") }}" alt="">
                @endif
            @endforeach
        </div>
    </div>

    <!-- Partners -->
    <div class="text-center text-gray-400 my-2">
        <h1 class="max-[639px]:text-lg text-xl my-4">Trusted by a couple of amazing companies!</h1>
        <div class="grid grid-cols-{{ count($partners) - 2 }} sm:flex justify-center">
            @foreach ($partners as $partner)
                @if (strlen($partner) > 2)
                    <img class="max-[639px]:h-10 h-14 max-[639px]:mr-4 mr-14 my-2 opacity-40" style="filter: grayscale(1)" src="{{ asset("storage/partners/$partner") }}" alt="">
                @endif
            @endforeach

        </div>
    </div>

    <!-- What Work we do -->
    {{-- <div>
        <h1 class="text-center font-extrabold text-2xl">A Peek at what we do!</h1>
        <h1 class="text-center">We have a professional for all the IT need you seek to find in our company at your disposal.</h1>
    </div> --}}
</div>
