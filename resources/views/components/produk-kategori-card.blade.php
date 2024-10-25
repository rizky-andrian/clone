<section class=" w-full relative text-gray-900 p-3">
    <div class="max-w-screen-lg mx-auto py-5 flex flex-col gap-10 ">
        <div class="text-center ">
            <h2 class=" text-3xl text-primary font-semibold"> Our Products</h2>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-4 grid-flow-row gap-6">
            @foreach ($katProduk as $item)
                <div class=" h-48 bg-slate-50 drop-shadow-lg rounded-3xl overflow-hidden relative ">
                    <div class="text-primary flex flex-col justify-start h-full">
                        <div class=" h-48 ">
                            <img class=" object-cover h-full w-full"
                                src="/storage/img/kategori-produk/{{ $item->gambar_produk }}"
                                alt="{{ $item->nama_kategori }}">
                        </div>
                    </div>
                    <a href="/products/kategori/{{ $item->slugs }}"
                        class="absolute bottom-0 flex flex-col justify-end h-48 w-full px-6">
                        <div class=" bg-primary bg-opacity-80 text-white text-sm rounded-2xl rounded-br-2xl">
                            <h2 class="mx-auto text-center py-2">{{ $item->nama_kategori }}</h2>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        <a href="/products" class="flex justify-center text-sm">
            <button class="bg-primary text-white rounded-tl-xl rounded-br-xl">
                <p class="py-2 px-3 ">Show All Product</p>
            </button>
        </a>
    </div>
</section>
