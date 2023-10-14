<div class="dark:text-white flex justify-between items-center px-2 mt-4 sm:px-10 transition duration-500 ease-in-out">
    <div class="bg-white bg-opacity-80 dark:bg-black dark:bg-opacity-80 font-montserrat relative">
        <h1 class="text-md sm:text-5xl text-center sm:text-left text-sky-500 dark:text-sky-500">
            <strong class="font-bold text-sky-500 dark:text-white">ALL YOUR IT NEEDS</strong> <br> IN ONE PLACE.
        </h1>
        @foreach ($slides as $slide)
            @if (strlen($slide) > 2)
                <img class="mslide sm:hidden h-auto w-auto mt-4 animate-mslidein sm:animate-slidein" src="{{ asset("storage/slideshow/$slide") }}" alt="{{ $slide }}">
                <h1 id="desc" class="animate-textslide text-amber-500 mt-2 sm:mt-8 font-bold text-md sm:text-2xl">{{ $slide }}</h1>
            @endif
        @endforeach
        @php
            $services = [
                "We are dedicated to safeguarding what matters most to you. Our cutting-edge 24 hour CCTV surveillance services offer a robust layer of protection for your home or business in high definition clarity.",
                "Elevate your brand's visual identity with the power of innovative graphics design encompassing a spectrum of creative possibilities, from eye-catching posters and flyers to distinctive business cards and beyond.",
                "We bring your brand to life on a grand scale. Our large format printing services are tailored to make your message stand out, whether it's on banners, teardrops, roll-ups, stickers or other captivating displays.",
                "We understand your product's branding is more than just a label. It's a story waiting to be told. Our branding services are designed to transform your creations into captivating narratives that resonate with your audience.",
                "In a digital world that thrives on innovation, we are your trusted partner in crafting software solutions for both you and your business. Contact us today for enterprise software, operating systems, antiviruses, etc.",
                "We specialize in web development that sums up innovation, responsive design, data-driven insights, and user-centric interfaces that create immersive digital experiences that captivate and engage your customers."
            ];
        @endphp
        @foreach ($services as $service)
            <p id="text" class="mt-2 mb-4 sm:mb-8 text-sm sm:text-base h-100 sm:h-24 font-semibold">{{ $service }}</p>
        @endforeach
        @for ($i = 0; $i < 6; $i++)
            <x-button class="gs animate-drop transition duration-100">GET SERVICE</x-button>
        @endfor
    </div>

    @foreach ($slides as $slide)
        @if (strlen($slide) > 2)
            <img class="slide bg-white bg-opacity-60 dark:bg-black dark:bg-opacity-60 slide h-500 mt-6 w-auto hidden sm:block animate-slidein" src="{{ asset("storage/slideshow/$slide") }}" alt="{{ $slide }}">
        @endif
    @endforeach
</div>
