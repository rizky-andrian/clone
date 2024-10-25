@extends('layouts.front')

@section('konten')
    <div class="w-full  ">
        <div class="flex flex-col gap-20 mb-20  mt-16 max-w-screen-lg  mx-auto ">
            <div class=" flex flex-col gap-2 hape:gap-16 hape:w-full  ">
                <div class=" h-80 mx-auto  w-max-screen-lg">
                    <img id="produkMainImage" class="h-full w-full object-cover rounded-md"
                        src="{{ '/storage/img/servis/' . $servis->gambar_servis }}" alt="">
                </div>

                <div class=" flex flex-col gap-2 mb-10 hape:mb-0 hape:mx-5">
                    <div class="text-2xl font-semibold hape:text-center">
                        <h1>{{ $servis->judul_servis }}</h1>
                    </div>
                    {{-- <h3 class="capitalize font-semibold text-primary-color-mtma ">Deskripsi</h3> --}}
                    <div>
                        {{ strip_tags($servis->deskripsi_servis) }}
                    </div>
                </div>
                <div class=" flex flex-col gap-3  bg-slate-100  rounded-lg hape:mx-5 ">
                    <div class="m-3 flex flex-col gap-3">
                        <div class="leading-4">
                            <h3 class="text-primary-color-mtma font-semibold text-  ">Tertarik Dengan Servis Kami ?</h3>
                            <span class=" text-xs italic text-gray-700 ">Hubungi kami melalu berbagai media dibawah ini
                                :</span>
                        </div>

                        <div class="flex gap-2 text-primary-color-mtma ">
                            <a class="hover:text-secondary1-color-mtma"
                                href="{{ 'https://api.whatsapp.com/send?phone=' . $companyInfo->company_phone . '&text=Saya%20mau%20bertanya%20mengenai%Servis%20Berikut:' . $servis->judul_servis . '%20Link%20: %20' . url()->current() }}"
                                target="_blank">
                                <i class="fa fa-whatsapp fa-3x hover:fa-5x" aria-hidden="true"></i></a>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
