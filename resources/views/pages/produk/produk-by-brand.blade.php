@extends('layouts.front')

@section('konten')
    <div class="w-full ">
        <div class="flex flex-col gap-20  mt-16 mb-20 max-w-screen-lg  mx-auto ">
            {{-- Katgeori --}}
            <div class="flex flex-col gap-5">
                <h1 class=" font-semibold text-2xl text-primary-color-mtma ">Produk By Brand</h1>
                <div class="grid grid-flow-col grid-cols-12 gap-8   ">
                    <div class=" flex flex-col col-span-4 gap-2 ">
                        <div class=" h-72  w-full">
                            <img id="produkMainImage" class="h-full w-full object-cover rounded-xl"
                                src="{{ '/storage/img/brand-produk/' . $brandProduk->gambar_brand }}" alt="">
                        </div>
                    </div>
                    <div class=" col-span-8 flex flex-col text-gray-800 gap-5">
                        <div class="text-2xl font-semibold ">
                            <h1>{{ $brandProduk->nama_brand }}</h1>
                        </div>
                        <div class=" flex flex-col gap-2">
                            <h3 class="capitalize font-semibold text-primary-color-mtma ">Deskripsi</h3>
                            <div>
                                {!! $brandProduk->deskripsi_brand !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid grid-flow-row grid-cols-4">
                @foreach ($brandProduk->produk as $item)
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
                                {!! Str::limit($item->deskripsi_produk, 160) !!}
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
            {{-- End Grid Produk --}}
        </div>
    </div>
@endsection
