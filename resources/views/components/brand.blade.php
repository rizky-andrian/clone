<section class="bg-primary w-full relative">
    <div class="max-w-screen-lg mx-auto py-10 px-4 text-gray-200 flex flex-col gap-5">
        <!-- Title -->
        <h2 class="text-center text-xl md:text-3xl font-semibold">{{ $brandDesc->title }}</h2>
        
        <!-- Brand Grid -->
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4">
            @foreach ($brand as $item)
                <div class="h-52 drop-shadow-lg rounded-tr-2xl rounded-bl-3xl bg-white flex flex-col justify-center relative">
                    <!-- Brand Logo -->
                    <div class="w-full mx-auto">
                        <img class="p-4 drop-shadow-md mx-auto h-28 object-contain" loading="lazy"
                            src="/storage/img/brand-produk/{{ $item->gambar_brand }}"
                            alt="{{ $item->brand_name }}">
                    </div>
                    <!-- Button -->
                    {{-- <a href="/{{ $item->slugs }}"
                        class="absolute bottom-2 right-2 h-10 w-10 bg-primary hover:bg-caa-primary rounded-full text-gray-200 flex items-center justify-center">
                        <i class="fas fa-arrow-right"></i>
                    </a> --}}
                </div>
            @endforeach
        </div>
    </div>

    <!-- Decorative Shape -->
    {{-- <div class="absolute flex justify-center -top-4 w-full">
        <div class="h-10 w-10 bg-white rounded-br-3xl rounded-bl-3xl"></div>
    </div> --}}

    <!-- Footer -->
    @php
        $year = date('Y');
    @endphp
    <div class="text-center py-2 text-gray-200 text-sm">
        Copyright &copy; {{ $year }} <b>PT.Cipta Aneka Air</b>
    </div>
</section>
