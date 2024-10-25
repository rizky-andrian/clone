@extends('layouts.front')

@section('konten')
    {{-- Hero Components --}}
    <section class="max-w-screen-lg mx-auto flex flex-col gap-5 ">
        <div class="flex gap-3">
            <div class="flex-1 bg-white drop-shadow rounded-xl relative overflow-hidden">
                <div class=" h-full my-auto flex flex-col justify-center ">
                    <img class=" p-5  " src="/storage/img/brand-produk/{{ $brandDetail->gambar_brand }}"
                        alt="{{ $brandDetail->nama_brand }}">
                </div>
            </div>
            <div class="flex-1 flex flex-col gap-5">
                <h1 class=" font-semibold text-xl text-gray-800 ">
                    {{ $brandDetail->nama_brand }}
                </h1>


                {!! $brandDetail->deskripsi_brand !!}

            </div>
        </div>

        {{-- Latest Produk --}}
        <div class="flex flex-col gap-2">
            <h2 class="text-left text-xl text-gray-800 font-bold underline underline-offset-8 decoration-caa-primary">
                {{ $brandDetail->nama_brand }} Product</h2>
            <div class="grid grid-flow-row grid-cols-3 lg:grid-cols-4 gap-5 mt-5">
                @foreach ($produk as $Dproduk)
                    <div class="h-auto bg-slate-100 drop-shadow rounded-xl flex flex-col gap-2 ">
                        <div class=" h-56 bg-slate-200 rounded-tl-xl rounded-tr-xl">
                            <img class=" h-full w-full object-cover rounded-tl-xl rounded-tr-xl "
                                src="{{ '/storage/img/produk/' . $Dproduk->imagesProduk[0]->gambar_produk }}"
                                alt="">
                        </div>
                        <div class="p-2 flex flex-col gap-2">
                            <div class="h-28 text-ellipsis overflow-hidden">
                                <a class=" text-sm text-gray-700 font-semibold ">{{ $Dproduk->nama_produk }}</a>
                                <p class=" text-xs text-gray-700 ">{{ $Dproduk->deskripsi_produk }}</p>
                            </div>
                            <div class="flex gap-1">
                                <div
                                    class="text-tiny flex-1  px-2 bg-caa-primary text-white rounded-lg flex flex-col justify-center h-6 w-20 text-center ">
                                    <span class=" leading-none ">
                                        {{ $Dproduk->brandProduk->nama_brand }}
                                    </span>
                                </div>
                                <div
                                    class="text-tiny flex-1  px-2 bg-caa-secondary text-white rounded-lg flex flex-col justify-center h-6 w-20 text-center ">
                                    <span>{{ $Dproduk->kategoriProduk->nama_kategori }}</span>
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
    </section>

    {{-- End Hero Components --}}
    {{-- pages detail --}}
    <section class=" max-w-screen-lg mx-auto ">
        {!! $brandDetail->content !!}
    </section>
    {{-- END  pages detail --}}
@endsection
