<div>
    <div class="h-sect w-sect absolute -ledft-300 bg-white border-4 border-sky-500 rounded-full justify-between flex">
        @foreach ($icons as $icon)
            @if (strlen($icon) > 2)
                <img class="h-24" src="{{ asset("storage/icons/$icon") }}" alt="">
            @endif
        @endforeach

    </div>
</div>
