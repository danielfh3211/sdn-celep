@php
    $kataPengantar = \App\Models\KataPengantar::first();
@endphp

<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-center mb-8">Kata Pengantar</h1>
    @if ($kataPengantar)
        <div class="max-w-3xl mx-auto">
            <div class="prose prose-lg">
                <p class="whitespace-pre-line text-justify leading-relaxed mb-8">
                    {{ $kataPengantar->content }}
                </p>
            </div>

            <div class=" mt-12">
                <p class="">{{ $kataPengantar->position }}</p>
                <h2 class=" font-semibold mt-2">{{ $kataPengantar->name }}</h2>
            </div>
        </div>
    @else
        <p class="text-center text-gray-500">Kata pengantar belum tersedia.</p>
    @endif
</div>
