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
        <div class="flex-1  rounded-lg relative">
            <img class=" w-full max-[700]: object-cover rounded-lg " src="/assets/img/teams.jpg" alt="">
            <div class="absolute top-0 flex w-full bg-caa-primary bg-opacity-50 rounded-tl-lg rounded-tr-lg">
                <p class="py-20 mx-auto w-full text-center font-semibold text-2xl text-white uppercase ">
                    History About our Company
                </p>
            </div>
        </div>
        <div class="flex-1 bg-slate-50 rounded-lg flex flex-col gap-4 p-4">
            <ol class="relative border-l border-gray-200 dark:border-gray-900">
                @foreach ($companyHistory as $history)
                <li class="mb-10 ml-4">
                    <div class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -left-1.5 border border-white dark:border-gray-200 dark:bg-primary">
                    </div>
                    <time class="mb-1 text-lg font-semibold leading-none text-caa-primary">{{ $history->tahun }}</time>
                    <p class="mb-4 text-base font-normal text-gray-800 dark:text-gray-600 text-justify">In the
                        {!! $history->descripiton !!}</p>
                </li>
                @endforeach
            </ol>
        </div>
    </div>
</div>
@endsection