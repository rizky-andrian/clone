@extends('layouts.front')

@section('konten')
    <div class="w-full ">
        <div class="flex flex-col gap-20 hape:gap-10 hape:mt-10  mt-16 mb-20 ">
            {{-- Produk Banner  --}}
            <livewire:servis-banner-pages />
            {{-- End Produk Banner --}}
            <div class="flex flex-col text-primary">
                <div class="text-center font-semibold text-2xl ">
                    <h2>Servis & Layanan</h2>
                </div>
                <span class="text-center text-xs font-semibold"><i>Servis dan Layanan yang kami sediakan</i></span>
            </div>
            {{-- Produk Head --}}
            <div class="grid grid-flow-col grid-cols-4 hape:grid-cols-1 hape:mx-5 gap-3 max-w-screen-lg mx-auto">
                @foreach ($servis as $item)
                    <div class=" overflow-hidden  h-96 bg-primary flex flex-col  rounded-lg drop-shadow-lg">
                        <div class="flex-1 h-48 w-full overflow-hidden">
                            <img class="w-full h-48 object-cover rounded-tl-lg rounded-tr-lg "
                                src="{{ '/storage/img/servis/' . $item->gambar_servis }}" alt="">
                        </div>
                        <div class="bg-secondary m-2 rounded-lg h-full flex flex-col justify-between  flex-1">
                            <div class="m-3 flex flex-col justify-center gap-2  text-gray-100 text-sm  ">
                                <div class="font-semibold text-lg ">
                                    <a href="{{ '/servis/' . $item->slug }}">{{ $item->judul_servis }}</a>
                                </div>
                                <div class="">
                                    {!! Str::limit($item->deskripsi_servis, 160) !!}
                                </div>

                            </div>
                            <a class=" bg-white text-primary hover:bg-primary hover:text-white rounded-xl m-3 "
                                href="{{ '/servis/' . $item->slug }}">
                                <button class="mx-auto w-full py-1 ">Detail</button>
                            </a>
                        </div>

                    </div>
                @endforeach
            </div>
            {{-- End Produk Head --}}

        </div>
    </div>
@endsection
