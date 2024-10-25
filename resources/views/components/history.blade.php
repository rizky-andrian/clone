@php
$thisYear = date('Y') - 2008;
@endphp

<section class=" w-full relative text-gray-900 px-5">
    <div class="max-w-screen-lg mx-auto py-14  flex flex-col gap-7 ">
        <h2 class="text-center text-3xl text-primary italic font-semibold"> {{ $thisYear }} Years of
            PT.
            Cipta
            Aneka
            Air</h2>
        <div>
            <ol class="items-center sm:flex">
                @foreach ($history as $histories)
                <li class="relative mb-6 sm:mb-0">
                    <div class="flex items-center">
                        <div class="z-10 flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full ring-0 ring-white dark:bg-blue-900 sm:ring-8 dark:ring-gray-200 shrink-0">
                            <svg class="w-2.5 h-2.5 text-white dark:text-blue-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                            </svg>
                        </div>
                        <div class="hidden sm:flex w-full bg-gray-200 h-0.5 dark:bg-gray-700"></div>
                    </div>
                    <div class="mt-3 sm:pr-8">
                        <h3 class="text-lg font-semibold text-gray-900"> {{ $histories->tahun }}
                        </h3>

                        <p class="text-xs font-normal text-gray-500 dark:text-gray-400">
                            {{ Str::limit($histories->descripiton, 60, '...') }}
                        </p>
                    </div>
                </li>
                @endforeach
            </ol>
        </div>
        <a class="text-lg italic hover:underline hover:font-semibold text-primary" href="/about-us/our-history">Read
            More..</a>
    </div>
</section>