<div class="relative w-full h-[500px] overflow-hidden">
    @if ($slides->count() > 0)
        <div class="relative h-full">
            @foreach ($slides as $index => $slide)
                <div
                    class="slide absolute inset-0 transition-opacity duration-500 ease-in-out {{ $index === 0 ? 'opacity-100' : 'opacity-0' }}">
                    <img src="{{ asset($slide->image) }}" alt="Slide {{ $index + 1 }}"
                        class="w-full h-full object-cover">
                </div>
            @endforeach

            {{-- Navigation Buttons --}}
            <button onclick="previousSlide()"
                class="absolute left-4 top-1/2 -translate-y-1/2 bg-black/50 text-white p-3 rounded-full hover:bg-black/75 transition-colors">
                <i class="fas fa-chevron-left"></i>
            </button>
            <button onclick="nextSlide()"
                class="absolute right-4 top-1/2 -translate-y-1/2 bg-black/50 text-white p-3 rounded-full hover:bg-black/75 transition-colors">
                <i class="fas fa-chevron-right"></i>
            </button>

            {{-- Indicators --}}
            <div class="absolute bottom-4 left-1/2 -translate-x-1/2 flex space-x-2">
                @foreach ($slides as $index => $slide)
                    <button onclick="goToSlide({{ $index }})"
                        class="w-3 h-3 rounded-full bg-white/50 hover:bg-white/75 transition-colors">
                    </button>
                @endforeach
            </div>
        </div>

        @push('scripts')
            <script>
                let currentSlide = 0;
                const slides = document.querySelectorAll('.slide');
                const totalSlides = slides.length;

                function showSlide(index) {
                    slides.forEach(slide => slide.classList.add('opacity-0'));
                    slides[index].classList.remove('opacity-0');
                    slides[index].classList.add('opacity-100');
                    currentSlide = index;
                }

                function nextSlide() {
                    showSlide((currentSlide + 1) % totalSlides);
                }

                function previousSlide() {
                    showSlide((currentSlide - 1 + totalSlides) % totalSlides);
                }

                function goToSlide(index) {
                    showSlide(index);
                }

                // Auto-advance slides
                setInterval(nextSlide, 5000);
            </script>
        @endpush
    @else
        <div class="h-full bg-gray-200 flex items-center justify-center">
            <p class="text-gray-500">No slider images available</p>
        </div>
    @endif
</div>
