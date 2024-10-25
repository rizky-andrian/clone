<section class="w-full bg-slate-100 max-w-screen-lg mx-auto relative rounded-3xl p-3">
    <div class="max-w-screen-lg mx-auto py-5 text-gray-800">
        <div class="m-0 md:m-8 flex flex-col">
            <div class="grid grid-flow-row grid-cols-3 md:grid-cols-4 gap-2">
                @foreach ($downlaodCenter as $dokumen)
                    <div class="grid grid-flow-row grid-cols-1 md:grid-cols-3 bg-white rounded-xl">

                        <div class="flex flex-col justify-center ">
                            <img class="" src="/assets/img/pdf-icon.png" alt="">
                        </div>
                        <div class="flex flex-col col-span-2 justify-center p-2">
                            <div class="flex flex-col gap-2">
                                <div class="flex flex-col">
                                    <h1 class="">{{ $dokumen->title }}</h1>
                                    <span class="text-xs">{{ $dokumen->desc }}</span>
                                </div>
                                <a target="_blank" href="/storage/dokumen/download-center/{{ $dokumen->file_dokumen }}"
                                    class="text-sm text-caa-primary text-left">Download</a>
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!--<div class="absolute flex justify-end  -top-16 w-full collapse md:visible">
        <img class="max-h-40 -mr-24 drop-shadow-lg" src="./assets/img/caa-logo.png" alt="">
    </div>-->
    <div class="absolute -top-6  flex justify-start w-full ">
        <h1 class="py-2 px-10 bg-caa-primary text-xl text-gray-100">Download Center</h1>
    </div>
</section>
