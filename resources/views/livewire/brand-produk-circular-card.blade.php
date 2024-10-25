<div class="flex-1 overflow-hidden ">
    <div class="m-2 flex flex-col gap-4">
        <h2 class=" text-lg font-semibold text-primary border-left border-l-4 border-primary  ">
            Brand Produk</h2>
        <div class="flex justify-start overflow-x-auto">
            @foreach ($brandData as $item)
                <a class="" href="{{ '/produk/brand/' . $item->slugs }}">
                    <div class="flex m-3 ">
                        <div class="relative">
                            <div class=" h-36  w-36  rounded-full bg-black ">
                                <img class=" w-full h-full object-cover rounded-full"
                                    src="{{ '/storage/img/brand-produk/' . $item->gambar_brand }}" alt="">
                            </div>
                            <div
                                class=" hover:bg-black hover:bg-opacity-50  absolute top-0 text-white rounded-full font-bold text-sm flex flex-col h-36  justify-center w-36  text-center ">
                                <h2>{{ $item->nama_brand }}</h2>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</div>
