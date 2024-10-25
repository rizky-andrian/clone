<div
    class="flex flex-col  bg-primary justify-center hape:justify-start hape:py-10 h-full gap-20 hape:gap-10 overflow-hidden  ">
    <div class=" text-gray-200 font-semibold text-4xl hape:text-xl text-center w-full ">
        <h1 class=" capitalize">Alasan bermitra dengan</h1>
        <span>Narayana Consulting</span>
    </div>
    <div class="  w-full mx-3 ">
        <div class=" hape:flex hape:flex-col grid gap-6 grid-flow-col grid-cols-3 w-full  max-w-screen-lg  mx-auto">
            @foreach ($dataStatic as $item)
                <div class=" bg-white h-96 rounded-tl-3xl rounded-br-3xl">
                    <div class=" h-48  w-full">
                        <img class=" mx-auto my-4 max-h-48 rounded-tl-lg rounded-tr-lg "
                            src="{{ '/storage/img/static-pages/' . $item->image }}">
                    </div>
                    <div class="m-3 flex flex-col gap-2">
                        <h3 class="text-center text-lg text-primary font-semibold">{{ $item->title }}</h3>
                        <p class="text-center font-semibold text-sm text-gray-800 hape:mx-3">
                            {{ Str::limit(strip_tags($item->content), 200, '.') }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
