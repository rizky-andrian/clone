<div class="max-w-screen-md mx-auto">
    <div class="flex flex-col gap-10">
        @if (url()->full() == env('APP_URL'))
            <div class="text-center font-semibold text-2xl text-primary-color-mtma  ">
                <h2>Produk Kami</h2>
            </div>
        @endif
        <div class="grid grid-flow-row grid-cols-3 gap-5">
            @foreach ($produk as $item)
                <div class="overflow-hidden  h-96 bg-slate-100 flex flex-col  w-56 rounded-lg drop-shadow-lg">
                    <div class=" h-48 w-full overflow-hidden">
                        <img class="w-full h-48 object-cover rounded-tl-lg rounded-tr-lg "
                            src="{{ '/storage/img/produk/' . $item['imagesProduk'][0]->gambar_produk }}" alt="">
                    </div>
                    <div class="m-3 flex flex-col gap-2 text-gray-700 text-sm">
                        <div class="font-semibold ">
                            <a href="{{ '/produk/' . $item->slugs }}">{{ $item->nama_produk }}</a>
                        </div>
                        <div class="">
                            {{ Str::limit($item->deskripsi_produk, 160) }}
                        </div>
                        @if (url()->full() == env('APP_URL'))
                            <div class=" hover:font-semibold  font-italic text-primary-color-mtma ">
                                <a href="{{ '/produk/' . $item->slugs }}"> <i>Detail</i> </a>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
        @if (url()->full() == env('APP_URL'))
            <div class="text-center text-sm">
                <button
                    class=" text-primary-color-mtma py-2 rounded-full  border-primary-color-mtma border-2 hover:bg-primary-color-mtma hover:text-white">
                    <a href="/produk" class="py-2 px-6">
                        Selengkapnya
                    </a>
                </button>

            </div>
        @endif

    </div>
</div>
