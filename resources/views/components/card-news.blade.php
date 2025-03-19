<div class="flex justify-start items-start gap-2 sm:gap-10 flex-wrap pb-10">
    <div class="w-[480px] h-80">
        <iframe class="w-full h-full" src="https://www.youtube.com/embed/{{ $videoUrl }}" frameborder="0"
            allowfullscreen></iframe>
    </div>
    <div class="max-w-[600px]">
        <h1 class="text-3xl font-bold mb-3">{{ $title }}</h1>
        <p class="text-lg">{{ $description }}</p>
    </div>
</div>
