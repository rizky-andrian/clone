@extends('layouts.front')

@section('konten')
    <div class=" max-w-screen-lg mx-auto flex flex-col gap-10 p-4">
        {{-- Latest Produk --}}
        <div class="flex flex-col gap-2">
            <h2
                class="text-left text-xl text-gray-800 font-bold  underline-offset-8 decoration-caa-primary flex flex-col gap-3">
                <div>
                    Search Product :
                </div>
                <div class="text-primary text-base">
                    Displaying {{ count($Produk->items()) }} Results for "{{ $searchData }}" Search
                </div>
            </h2>
            @if (count($Produk->items()) <= 0)
                <div class="text-center text-3xl">
                    <h1>The search did not return any results. Please try using other keywords.</h1>
                </div>
            @else
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
                                    <a
                                        class=" text-sm text-gray-700 font-semibold uppercase">{{ $Dproduk->nama_produk }}</a>
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
            @endif
        </div>
        {{-- END Latest Produk --}}
    </div>
    <div class="">
        {{ $Produk->links() }}
    </div>

@endsection
