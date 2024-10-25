@extends('layouts.front')

@section('konten')
    <div class="w-full ">
        <div class="flex flex-col max-w-screen-lg  mx-auto ">
            <div class=" flex flex-col ">
                <div class=" mx-auto  w-full">
                    <img class="h-full w-full object-cover rounded-md" src="{{ '/storage/img/blog-news/' . $news->image }}"
                        alt="">
                </div>
                <div class=" flex flex-col gap-5">
                    <div class="">
                        <h1 class=" font-semibold text-gray-700 text-3xl ">{{ $news->title }}</h1>
                        {{-- <span class=" italic font-gray-700   ">
                            {{ \Carbon\Carbon::parse($news->created_at)->diffForhumans() }} --}}
                    </div>
                    <div>
                        {!! $news->content !!}
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
