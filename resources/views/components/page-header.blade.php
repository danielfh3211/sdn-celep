<div class="relative pt-12">
    <div class="w-full h-40 sm:h-[210px] bg-cover bg-center ">
        <div class="bg-black w-full h-full absolute inset-0 z-0">
            <div class="absolute inset-0 opacity-60 z-10">
                <img class="object-cover sm:h-[340px] h-full w-full" src="{{ $backgroundImage }}" alt="">
            </div>
        </div>
        <div class="container mx-auto px-4 h-full flex-col align-center relative w-full z-20">
            <h1 class="text-white text-4xl md:text-6xl font-cursive font-bold mt-20 text-center ">{{ $title }}
            </h1>
            @if ($subtitle)
                <h1 class="text-white text-4xl md:text-5xl font-cursive font-bold mt-6 text-center">{{ $subtitle }}
                </h1>
            @endif
        </div>
    </div>
</div>

<div class="px-10 sm:px-40">
    <div class="border-b-1 my-3"></div>
</div>
