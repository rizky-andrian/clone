<div class="relative hape:-mb-9  ">
    <div class="h-slider hape:hidden  ">
        <img class="h-full object-cover" src="/assets/img/hero-background.png" />
    </div>
    <div
        class="absolute hape:relative  h-slider w-full inset-0 text-white text-xs leading-4 laptop:px-6 tablet:px-4 overflow-hidden ">
        <div class="flex flex-col justify-center h-slider ">
            <div class="mx-auto">
                <div class="max-w-screen-lg">
                    <div class="flex hape:flex-col-reverse justify-between gap-5 flex-row-reverse">
                        <div class="flex flex-1 my-auto w-full ">
                            <div class="text-secondary hape:text-center hape:mx-auto">
                                <h1
                                    class="text-3xl hape:capitalize hape:text-xl hape:text-center font-bold uppercase tablet:text-lg">
                                    {{ $servisPages[0]->title }}
                                </h1>
                                <h2
                                    class="text-primary hape:text-center text-xl font-semibold capitalize text-justify leading-6 tablet:text-sm hape:text-xs">
                                    {!! $servisPages[0]->content !!}
                                </h2>
                            </div>
                        </div>
                        <div class="flex-1 flex">
                            <div class="my-auto tablet:mx-auto">
                                <img class=" h-full w-full hape:max-h-80  object-cover"
                                    src="{{ '/storage/img/static-pages/' . $servisPages[0]->image }}"
                                    alt=" {{ $servisPages[0]->title }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
