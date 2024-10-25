<div class="w-full mx-auto bg-primary-color-mtma ">
    <div class="flex gap-5 h-slider">
        <div class="flex-1 relative">
            <img class="w-full h-full object-cover rounded-tr-panel1 "
                src="/storage/img/static-pages/{{ $staticData->image }}" alt="">
            <div
                class="absolute top-0 w-full h-full font-bold text-white text-3xl bg-opacity-20 text-left flex flex-col justify-start">

            </div>

        </div>
        <div class="flex-1 ">
            <div class="m-5 flex flex-col gap-2 justify-start text-slate-200">
                <div>
                    <h1 class="font-semibold text-2xl">{{ $staticData->title }}</h1>
                </div>
                {!! $staticData->content !!}
            </div>
        </div>
    </div>
</div>
