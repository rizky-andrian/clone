<section class=" bg-primary w-full relative">
    <div class="max-w-screen-lg mx-auto py-14 text-gray-200 flex flex-col gap-7">
        <h2 class="text-center text-3xl">{{ $brandDesc->title }}</h2>
        <div class="grid grid-cols-5 {{-- md:grid-cols-4 --}} gap-5 {{-- max-w-4xl --}}  w-full mx-auto p-4">
            @foreach ($brand as $item)
                <div
                    class=" h-52 drop-shadow-lg rounded-tr-2xl rounded-bl-3xl bg-white flex flex-col justify-center relative">
                    <div class="w-full mx-auto">
                        <img class="p-4 drop-shadow-md" src="/storage/img/brand-produk/{{ $item->gambar_brand }}"
                            alt="">
                    </div>
                    <a href="/{{ $item->slugs }}"
                        class="absolute h-10 w-10 hover:bg-caa-primary m-2 bottom-0 bg-primary rounded-full text-gray-200 flex flex-col justify-center">
                        <i class="fas fa-arrow-right mx-auto"></i>
                    </a>
                </div>
            @endforeach
        </div>
        <p class="text-center"> {!! $brandDesc->content !!} </p>
    </div>

    <div class="absolute flex justify-center -top-4 w-full">
        <div class="h-10 w-10 bg-white rounded-br-3xl rounded-bl-3xl ">
        </div>
    </div>
    @php
        $year = date('Y');
    @endphp
    <div class="text-center py-1 text-gray-200">
        Copyright @ {{ $year }} <b>PT.Cipta Aneka Air</b>
    </div>
</section>
