@extends('layouts.front')

@section('konten')
    <div class="w-full ">
        <div class="flex flex-col gap-10 mb-10 max-w-screen-lg  mx-auto ">
            {{-- Brand Product --}}
            <div class="flex flex-col gap-2">
                <div class="grid grid-cols-3 lg:grid-cols-7 justify-items-center gap-2 mt-5">
                    @foreach ($DkategoriProduk as $item)
                        <a href="/products/kategori/{{ $item->slugs }}"
                            class="h-16 mt-2 bg-slate-100 rounded-xl drop-shadow-lg ">
                            <div class="m-2 flex flex-col justify-start h-full">
                                <div
                                    class="grid @if (url()->current() == env('APP_URL') . '/products/kategori/' . $item->slugs ||
                                            Str::startsWith(url()->current(), env('APP_URL') . '/products/kategori/' . $item->slugs)) ) bg-white text-caa-primary hover:bg-caa-primary hover:text-white @else bg-caa-primary text-white hover:text-caa-primary hover:bg-white @endif h-24 w-20 lg:w-28  content-center bg-opacity-60 font-semibold hover:drop-shadow-xl rounded-tl-2xl rounded-br-2xl">
                                    <h2 class="text-center p-1">{{ $item->nama_kategori }}</h2>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
            {{-- END Brand Product --}}

            {{-- Produk Bykategori --}}
            <div class="flex flex-col gap-2 p-3">
                <h2
                    class="text-left text-xl text-gray-800 font-bold underline underline-offset-8 decoration-caa-primary uppercase">
                    {{ $kategoriProduk->slugs }}
                </h2>
                <div class="grid grid-flow-row grid-cols-3 lg:grid-cols-4 gap-4 mt-5">
                    @foreach ($produk->items() as $Dproduk)
                        <div class="h-auto bg-slate-100 drop-shadow-xl rounded-xl flex flex-col gap-2 ">
                            <div class=" h-56 bg-slate-200 rounded-tl-xl rounded-tr-xl">
                                <img class=" h-full w-full object-cover rounded-tl-xl rounded-tr-xl "
                                    src="{{ '/storage/img/produk/' . $Dproduk->imagesProduk[0]->gambar_produk }}"
                                    alt="">
                            </div>
                            <div class="p-3 flex flex-col gap-2">
                                <div class=" h-36  text-ellipsis overflow-hidden flex flex-col gap-3">
                                    <a
                                        class=" text-sm text-gray-700 font-semibold uppercase">{{ $Dproduk->nama_produk }}</a>
                                    <div class=" text-sm text-gray-700  text-justify">
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
            {{-- END Produk Bykategori --}}
        </div>
    </div>
    <div class="">
        {{ $produk->links() }}
    </div>
@endsection
