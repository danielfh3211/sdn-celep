<div x-data="{
    activeSlide: 0,
    slides: {{ Js::from($slides) }},
    loop() {
        setInterval(() => this.activeSlide = (this.activeSlide + 1) % this.slides.length, 5000)
    }
}" x-init="loop"
    class="relative w-full sm:h-[600px] h-[250px] overflow-hidden flex items-center justify-center mx-auto mt-20">

    <!-- Slides -->
    <template x-for="(slide, index) in slides" :key="index">
        <div x-show="activeSlide === index" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform translate-x-full"
            x-transition:enter-end="opacity-100 transform translate-x-0"
            x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="opacity-100 transform translate-x-0"
            x-transition:leave-end="opacity-0 transform -translate-x-full" class="absolute inset-0">
            <img :src="'{{ asset('') }}' + slide.image" class="w-full h-full object-cover">
        </div>
    </template>

    <!-- Navigation buttons -->
    <div class="absolute inset-x-0 bottom-4 flex justify-center space-x-2">
        <template x-for="(slide, index) in slides" :key="index">
            <button @click="activeSlide = index"
                :class="{ 'bg-white': activeSlide === index, 'bg-white/50': activeSlide !== index }"
                class="w-2 h-2 rounded-full transition-all duration-300"></button>
        </template>
    </div>

    <!-- Previous/Next Buttons -->
    <button @click="activeSlide = activeSlide === 0 ? slides.length - 1 : activeSlide - 1"
        class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-black/30 text-white p-2 rounded-full hover:bg-black/50 transition-all">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
    </button>
    <button @click="activeSlide = (activeSlide + 1) % slides.length"
        class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-black/30 text-white p-2 rounded-full hover:bg-black/50 transition-all">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
        </svg>
    </button>
</div>
