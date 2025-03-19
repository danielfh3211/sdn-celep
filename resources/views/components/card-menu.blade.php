<div class="flex flex-wrap justify-center items-center gap-4">
    @if ($backgroundImage)
        <div class="h-96 w-96 bg-white shadow-lg rounded-sm relative">
            <a class="absolute z-20" href="{{ $href }}">
                <img class="w-full" src="{{ $backgroundImage }}" alt="">
            </a>
        </div>
    @else
        <div class="h-96 w-96 bg-white shadow-lg rounded-sm relative">
            <div
                class="w-[350px] mx-auto h-60 px-5 my-15 bg-gradient-to-r from-blue-600 to-purple-600 rounded-sm flex flex-col justify-end items-center gap-4 relative">
                <img class="h-40 w-40 absolute right-0 top-0 z-10 object-contain" src="/assets/img/star.png"
                    alt="">

                <h1 class="text-white text-4xl font-bold text-center">{{ $title }}</h1>
                <a href="{{ $href }}"
                    class="mb-8 px-8 py-2 bg-pink-400 rounded-2xl text-white text-lg font-bold hover:scale-105 transition-all hover:text-gray-500">Click
                    Here</a>
            </div>
        </div>
    @endif

</div>
