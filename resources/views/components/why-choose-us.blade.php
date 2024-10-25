<section class=" w-full relative text-gray-900 p-3">
    <div class="max-w-screen-lg mx-auto py-5  flex flex-col gap-20 ">
        <h2 class="text-center text-3xl text-primary italic font-semibold"> Why Choose Us ?</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 justify-items-center max-w-3xl mx-auto gap-10 ">
            @foreach ($wCu as $whyc)
                <div class="  h-80   bg-slate-100 drop-shadow-lg rounded-3xl relative  ">
                    <div class="p-5  text-primary flex flex-col justify-center  h-full z-10">
                        <div class="justify-center text-center">
                            {{ $whyc->content }}
                        </div>
                    </div>

                    <div class="w-full  absolute -top-10 flex justify-center">
                        <div
                            class="h-16 w-16 bg-slate-100  drop-shadow-lg rounded-full flex flex-col justify-center outline-primary border-primary border-4 ">
                            <div class="mx-auto text-primary font-semibold text-3xl">
                                <span>{{ $loop->index + 1 }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="absolute bottom-2 overflow-hidden">
                        <img class="opacity-10 px-5" src="/assets/img/caa-logo.png" alt="">
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
