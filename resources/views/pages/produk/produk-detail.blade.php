@extends('layouts.front')

@section('konten')
    <div class=" w-full">
        <div class="max-w-screen-lg mx-auto px-4 sm:px-6 lg:px-8 flex flex-col gap-4">
            <div class="flex flex-col md:flex-row -mx-4">
                <div class="md:flex-1 px-4">
                    <div class="h-[460px] rounded-lg overflow-hidden bg-slate-100 drop-shadow-xl flex flex-col gap-2">
                        <img class="w-full h-full object-cover"
                            src="{{ '/storage/img/produk/' . $produk->imagesProduk[0]->gambar_produk }}" alt="Product Image">
                    </div>
                </div>
                <div class="md:flex-1 px-4 mt-8 lg:mt-0 flex flex-col gap-5 justify-center">
                    <h2 class="text-2xl font-bold text-gray-800  mb-2">{{ $produk->nama_produk }}</h2>
                    <div class="text-xs flex gap-5 mb-4">
                        <a href="{{ '/products/kategori/' . $produk->kategoriProduk->slugs }}" target="_blank"
                            class="flex gap-2">
                            <div
                                class=" h-20 w-20 rounded-full border-2 p-0.5 border-caa-secondary bg-white overflow-hidden">
                                <img class="w-full h-full object-contain "
                                    src="{{ '/storage/img/kategori-produk/' . $produk->kategoriProduk->gambar_produk }}"
                                    alt="">
                            </div>
                            <div class="h-20 flex flex-col justify-center">
                                <h2 class="uppercase font-semibold bg-primary p-3 rounded-full text-gray-200">
                                    {{ $produk->kategoriProduk->nama_kategori }}
                                </h2>
                            </div>
                        </a>
                        <a href="{{ '/' . $produk->brandProduk->slugs }}" class="flex gap-2">
                            <div
                                class=" h-20 w-20 rounded-full border-2 p-0.5 border-caa-secondary bg-white overflow-hidden">
                                <img class="w-full h-full object-contain"
                                    src="{{ '/storage/img/brand-produk/' . $produk->brandProduk->gambar_brand }}"
                                    alt="">
                            </div>
                            <div class="h-20 flex flex-col justify-center">
                                <h2 class="uppercase font-semibold bg-blue-700 p-3 rounded-full text-gray-200">
                                    {{ $produk->brandProduk->nama_brand }}
                                </h2>
                            </div>
                        </a>
                    </div>
                    <div class="flex flex-col gap-2">
                        <div>
                            <span class="font-bold text-gray-700">Price
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</span>
                            <span
                                class="text-gray-800 font-semibold text-lg ">{{ App\Http\Utils\Utility::formatRupiah($produk->harga_produk) }}</span>
                        </div>
                        <div>
                            <span class="font-bold text-gray-700">Unit
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</span>
                            <span class="text-gray-800 font-semibold text-lg ">{{ $produk->satuan_produk }}</span>
                        </div>
                        <div>
                            <span class="font-bold text-gray-700">On Stok &nbsp;&nbsp;&nbsp;:</span>
                            <span class="text-gray-800 font-semibold text-lg ">{{ $produk->stok_produk }}</span>
                        </div>
                    </div>
                    {{-- Hotline --}}
                    <div class="flex flex-col gap-3">
                        <h3 class="text-primary-color-mtma font-semibold text-2xl">Lets talk about everything !</h3>
                        <div class="flex flex-col gap-2">
                            <span class=" text-xs italic text-gray-700 ">Contact us through the following channels:
                                :</span>
                            <div class=" text-xs flex gap-5 text-primary">
                                <a class="hover:text-blue-600" href="tel:02159582271" target="_blank">
                                    <i class="fa fa-phone fa-flip-horizontal fa-2x  " aria-hidden="true"></i>
                                </a>
                                <a class="hover:text-blue-600"
                                    href="{{ 'https://www.instagram.com/ciptaanekaair?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==' }}"
                                    target="_blank">
                                    <i class="fa fa-instagram fa-2x " aria-hidden="true"></i>
                                </a>
                                <a class="hover:text-blue-600" href="mailto:sales@ciptaanekaair.co.id" target="_blank">
                                    <i class="fa fa-envelope-o fa-2x " aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    {{-- End Hotline --}}
                </div>
            </div>
            <div>
                <div>
                    <span class="font-bold text-gray-800 text-xl ">Product Description:</span>
                    <p class="text-gray-700 text-lg  mt-2 text-justify">
                        {!! $produk->deskripsi_produk !!}
                    </p>
                </div>
            </div>
        </div>

        {{-- Produk Komplementer --}}
        <div class="max-w-screen-lg m-auto px-4 pt-5">
            <h2 class="text-left text-xl text-gray-800 font-bold underline underline-offset-8 decoration-caa-primary my-10">
                Products Substitusi</h2>
            <div class="grid grid-flow-row grid-cols-2 lg:grid-cols-4 gap-8 mt-5 pb-8">
                @foreach ($pdserupa as $item)
                    <div class="h-auto bg-slate-100 drop-shadow-xl rounded-xl flex flex-col gap-2 ">
                        <div class=" h-56 bg-slate-200 rounded-tl-xl rounded-tr-xl">
                            <img class=" h-full w-full object-cover rounded-tl-xl rounded-tr-xl "
                                src="{{ '/storage/img/produk/' . $item->imagesProduk[0]->gambar_produk }}" alt="">
                        </div>
                        <div class="p-2 flex flex-col gap-2">
                            <div class="h-28 text-ellipsis overflow-hidden">
                                <a class=" text-sm text-gray-700 font-semibold ">{{ $item->nama_produk }}</a>
                                <div class=" text-xs text-gray-700 ">{!! $item->deskripsi_produk !!}</div>
                            </div>
                            <div class="flex gap-1">
                                <div
                                    class="text-tiny flex-1 uppercase px-2 bg-caa-primary text-white rounded-lg flex flex-col justify-center h-6 w-20 text-center ">
                                    <span>{{ $item->brandProduk->nama_brand }}</span>
                                </div>
                                <div
                                    class="text-tiny flex-1 uppercase px-2 bg-caa-secondary text-white rounded-lg flex flex-col justify-center h-6 w-20 text-center ">
                                    <span>{{ $item->kategoriProduk->nama_kategori }}</span>
                                </div>
                            </div>

                        </div>
                        <a href="/products/{{ $item->slugs }}"
                            class="absolute top-0 flex flex-col justify-center h-full w-full">
                        </a>
                    </div>
                @endforeach
            </div>
            <a href="/products" class="flex justify-center text-sm">
                <button class="bg-primary text-white rounded-tl-xl rounded-br-xl">
                    <p class="p-4">Learn More Product</p>
                </button>
            </a>
        </div>
        {{-- End Produk Komplementer --}}
    </div>
@endsection
