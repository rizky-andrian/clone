@extends('layouts.front')

@section('konten')

    {{-- Slider Components --}}
    <div class="m-5">
        @include('components.slider')
    </div>
    {{-- End Slider Components --}}
    {{-- Intro Section --}}
    {{-- <section class="w-full bg-slate-100 max-w-screen-lg mx-auto relative rounded-br-panel1 p-3">
        <div class="max-w-screen-lg mx-auto py-8 text-gray-800 ">
            <div class="m-8 flex flex-col gap-5">
                <div>
                    <h2 class="text-3xl text-gray-700">{{ $intro->title }}</h2>
                    <span class="text-xl text-primary italic ">Trusted partner and au thorized distributor for the
                        best
                        brand
                        and product in Water Technologies
                    </span>
                </div>
                <p class=" text-gray-900 text-lg text-justify "> {!! $intro->content !!}</p>
            </div>
        </div>
        <div class="absolute flex justify-end -top-16 w-full collapse md:visible">
            <img class="max-h-40 -mr-24 drop-shadow-lg" src="./assets/img/caa-logo.png" alt="">
        </div>
        <div class="absolute -top-6  flex justify-start w-full ">
            <h1 class="py-2 px-10 bg-caa-primary text-xl text-gray-100">Introduction</h1>
        </div>
    </section> --}}
    {{-- END  Intro Section --}}
    {{-- History Of 12 Years of CAA --}}
    <div class="mb-4">
        @include('components.history')
    </div>
    {{-- End History of Caa --}}

    {{-- Product Explore --}}
    <div class="mb-4">
        @include('components.produk-kategori-card')
    </div>
    {{-- End Product Explore --}}

    {{-- Latest News --}}
    <div class="mb-4">
        @include('components.news-card')
    </div>
    {{-- End Latest News --}}
    {{-- Customer Card --}}
    <div class="mb-4">
        @include('components.customer-card')
    </div>
    {{-- End Customer Card --}}

    {{-- Why Choose Us --}}
    <div class="mb-4">
        @include('components.why-choose-us')
    </div>
    {{-- End Why Choose Us --}}

    {{-- Download Center Section --}}
    <div class="mb-4">
        @include('components.download-center-card')
    </div>
    {{-- END  Download Center Section --}}
@endsection
