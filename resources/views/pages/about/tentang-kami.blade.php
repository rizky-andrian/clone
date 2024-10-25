@extends('layouts.front')

@section('konten')
    <div class="w-full flex flex-col gap-5  max-w-screen-lg mx-auto p-3">
        <div class="relative">
            <img class=" rounded-2xl " src="/assets/img/about-img.jpg" alt="">
            <div class="absolute bg-caa-primary top-0 h-full flex flex-col justify-center bg-opacity-50 w-full rounded-2xl">
                <div class=" mx-auto ">
                    <div class="  text-center text-gray-100 ">
                        <h1 class=" font-bold text-6xl  ">ABOUT <span class=" underline ">US</span></h1>
                    </div>
                </div>
            </div>
        </div>
        @include('components.nav-about')
        <div class="flex justify-between gap-2 my-20">
            <div class="flex-1 bg-slate-50 rounded-lg flex flex-col gap-10 p-10 py-20">
                <img class=" px-20 object-cover "
                    src="{{ env('APP_URL') . '/storage/img/company/' . $companyInfo->company_logo }}" alt="">
                <div class="max-w-screen-lg mx-auto py-8 text-gray-800 ">
                    <div class="m-8 flex flex-col gap-5">
                        <div>
                            <h2 class="text-3xl text-gray-700">{{ $intro->title }}</h2>
                            <span class="text-xl text-primary italic ">Trusted partner and authorized distributor for the
                                best
                                brand
                                and product in Water Technologies
                            </span>
                        </div>
                        <p class=" text-gray-900 text-lg text-justify "> {!! $intro->content !!}</p>
                    </div>
                </div>
                <hr>
                <div>
                    <h2 class="text-3xl text-primary font-semibold">Contact Us</h2>
                </div>
                <div class="max-w-screen-xl grid grid-cols-1 md:grid-cols-3 mx-5 md:mx-auto gap-4 content-star">
                    <div class="col-span-2 rounded-lg ">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.808459719043!2d106.66864958843387!3d-6.156402489828902!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f9cee62cceb7%3A0xba6a22f075f405fb!2sPT.%20Cipta%20Aneka%20Air!5e0!3m2!1sid!2sid!4v1631502375900!5m2!1sid!2sid"
                            width="100%" height="300" class="rounded-lg drop-shadow" style="border:0;"
                            allowfullscreen="" loading="lazy"></iframe>
                    </div>

                    <div class="flex flex-col justify-center">
                        <div class=" ">
                            <img class=" max-h-40 -mt-20" src="/assets/img/maps.png" alt="">
                            <div class="flex ">
                                <i class="fas fa-map pr-2 pt-2"></i>
                                <p class="text-gray-700 text-justify ">
                                    {{ $companyInfo->company_address }}
                                </p>
                            </div>
                            <br>
                            <a href="tel:{{ $companyInfo->company_phone }}" class="text-gray-700 py-2">
                                <i class="fa fa-phone"></i>&nbsp;&nbsp; {{ $companyInfo->company_phone }}
                            </a><br>
                            <a href="mailto:{{ $companyInfo->company_email }}" class="text-gray-700 py-2">
                                <i class="fa fa-envelope-open"></i>&nbsp;&nbsp; {{ $companyInfo->company_email }}
                            </a>
                            <br>
                            <a href="https://www.instagram.com/ciptaanekaair/" target="_blank" class="text-gray-700 py-2">
                                <i class="fa fa-instagram"></i>&nbsp;&nbsp; {{ '@ciptaanekaair' }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
