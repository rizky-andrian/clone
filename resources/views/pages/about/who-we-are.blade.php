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
    <div class="flex justify-between gap-2 my-10 grid grid-cols-1 md:grid-cols-2">
        <div class="flex-1 bg-slate-50 rounded-lg relative">
            <img class=" w-full h-full object-cover rounded-lg " src="/assets/img/teams.jpg" alt="">
            <div class="absolute top-0 flex w-full bg-caa-primary bg-opacity-50 rounded-tl-lg rounded-tr-lg">
                <p class="py-20 mx-auto w-full text-center font-semibold text-2xl text-white uppercase ">
                    Our Wonderful Teams
                </p>
            </div>
        </div>
        <div class="flex-1 bg-slate-50 rounded-lg flex flex-col gap-4 p-4">
            <h2 class=" text-2xl font-semibold text-gray-700 ">Board Of Director</h2>
            {!! $content->content !!}
        </div>
    </div>
</div>
@endsection