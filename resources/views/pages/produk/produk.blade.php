@extends('layouts.front')

@section('konten')
    <div class=" max-w-screen-lg mx-auto flex flex-col gap-10 p-4">
        {{-- Product Banner --}}
        {{-- Slider Components --}}
        <div class="m-5">
            @include('components.slider-product')
        </div>
        {{-- End Slider Components --}}
        {{-- End Product Banner --}}
        {{-- Kategori Produk --}}
        <section class=" w-full relative text-gray-900 ">
            <div class="max-w-screen-lg mx-auto py-5  flex flex-col gap-10 ">
                <h2 class="text-left text-xl text-gray-800 font-bold underline underline-offset-8 decoration-caa-primary">
                    Product By Category</h2>
                <div class="p-6 grid grid-cols-2 lg:grid-cols-4 grid-flow-row gap-6 bg-slate-100 rounded-xl">
                    @foreach ($katProduk as $item)
                        <div class="h-48 bg-slate-50 drop-shadow-lg rounded-3xl overflow-hidden relative ">
                            <div class="text-primary flex flex-col justify-start h-full">
                                <div class=" h-48 ">
                                    <img class=" object-cover h-full w-full"
                                        src="/storage/img/kategori-produk/{{ $item->gambar_produk }}"
                                        alt="{{ $item->nama_kategori }}">
                                </div>
                            </div>
                            <a href="/products/kategori/{{ $item->slugs }}"
                                class="absolute top-0 flex flex-col justify-center h-48 w-full px-6">
                                <div
                                    class=" bg-caa-primary bg-opacity-60 text-white hover:text-caa-primary hover:bg-white font-semibold hover:drop-shadow-xl rounded-tl-2xl rounded-br-2xl ">
                                    <h2 class="mx-auto text-center py-2">{{ $item->nama_kategori }}</h2>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        {{-- END Kategori --}}

        {{-- Latest Produk --}}
        <div class="flex flex-col gap-2">
            <h2 class="text-left text-xl text-gray-800 font-bold underline underline-offset-8 decoration-caa-primary">Latest
                Products</h2>
            <div class="grid grid-flow-row grid-cols-3 lg:grid-cols-4 gap-4 mt-5">
                @foreach ($Produk->items() as $Dproduk)
                    <div class="h-auto bg-slate-100 drop-shadow-xl rounded-xl flex flex-col gap-2 ">
                        <div class=" h-56 bg-slate-200 rounded-tl-xl rounded-tr-xl">
                            <img class=" h-full w-full object-cover rounded-tl-xl rounded-tr-xl "
                                src="{{ '/storage/img/produk/' . $Dproduk->imagesProduk[0]->gambar_produk }}"
                                alt="">
                        </div>
                        <div class="p-3 flex flex-col gap-2">
                            <div class=" h-36  text-ellipsis overflow-hidden flex flex-col gap-3">
                                <a class=" text-sm text-gray-700 font-semibold uppercase">{{ $Dproduk->nama_produk }}</a>
                                <div class=" text-sm text-gray-700  text-justify ">
                                    {!! Str::limit($Dproduk->deskripsi_produk, 100, '...') !!}
                                </div>
                            </div>
                            <div class="flex gap-1">
                                <div
                                    class="text-tiny uppercase  px-2 bg-caa-primary text-white rounded-lg flex flex-col justify-center h-6 flex-1 text-center ">
                                    <span>
                                        {{ $Dproduk->brandProduk->nama_brand }}
                                    </span>
                                </div>
                                <div
                                    class=" text-tiny bg-caa-secondary text-white rounded-lg flex flex-col justify-center h-6 flex-1 text-center ">
                                    <span class="uppercase">{{ $Dproduk->kategoriProduk->nama_kategori }}</span>
                                </div>
                            </div>

                        </div>
                        <a href="/products/{{ $Dproduk->slugs }}"
                            class="absolute top-0 flex flex-col justify-center h-full w-full">
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
        {{-- END Latest Produk --}}
    </div>
    <div class="">
        {{ $Produk->links() }}
    </div>
@endsection
