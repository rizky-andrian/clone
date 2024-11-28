@extends('layouts.front')

@section('konten')
    <style>
        .hidden {
            opacity: 0;
            transform: translateY(-10px);
            /* Optional: Adds a little sliding effect */
            visibility: hidden;
            /* Makes the element invisible */
            transition: opacity 0.3s ease, transform 0.3s ease, visibility 0.3s ease;
        }

        /* When the section is visible */
        .visible {
            opacity: 1;
            transform: translateY(0);
            /* Return to original position */
            visibility: visible;
            /* Make it visible */
        }

        #carousel {
            position: relative;
            overflow: hidden;
        }
        
        #carousel > div {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }
        
        img {
            width: 100%;
            flex-shrink: 0;
        }
        
        /* button {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            z-index: 10;
            background: rgba(0, 0, 0, 0.1);
            color: white;
            border: none;
            padding: 10px;
            border-radius: 50%;
            cursor: pointer;
        } */
        
        #prevButton {
            left: 10px;
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            z-index: 10;
            background: rgba(0, 0, 0, 0.1);
            color: white;
            border: none;
            padding: 10px;
            border-radius: 50%;
            cursor: pointer;
        }
        
        #nextButton {
            right: 10px;
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            z-index: 10;
            background: rgba(0, 0, 0, 0.1);
            color: white;
            border: none;
            padding: 10px;
            border-radius: 50%;
            cursor: pointer;
        }
    </style>




    <div class="w-full flex flex-col gap-5  max-w-screen-lg mx-auto p-3">

        {{-- @include('components.slider') --}}

        {{-- <div class="relative">
            <img class=" rounded-2xl " src="/assets/img/TEAM/team1.jpg" alt="">
            <div class="absolute bg-caa-primary top-0 h-full flex flex-col justify-center bg-opacity-50 w-full rounded-2xl">
                <div class=" mx-auto ">
                    <div class="  text-center text-gray-100 ">
                        <h1 class=" font-bold text-6xl  ">ABOUT US</h1>
                    </div>
                </div>
            </div>
        </div> --}}

        <div class="relative">
            <!-- Carousel Container -->
            <div id="carousel" class="relative overflow-hidden rounded-2xl">
                <!-- Carousel Items Wrapper -->
                <div class="flex transition-transform duration-500">
                    <!-- Carousel Items -->
                    @foreach ($teamImages as $image)
                        <img class="w-full flex-shrink-0" src="{{ $image->url }}" alt="{{ $image->alt }}">
                    @endforeach
                </div>
            </div>
        
            <!-- Navigation Buttons -->
            <button id="prevButton" aria-label="Previous Slide" class="absolute top left-0 transform -translate-y-1/2 bg-gray-800 bg-opacity-50 text-white p-2 rounded-r">
                &#10094; <!-- Left Arrow Icon -->
            </button>
            <button id="nextButton" aria-label="Next Slide" class="absolute top right-0 transform -translate-y-1/2 bg-gray-800 bg-opacity-50 text-white p-2 rounded-l">
                &#10095; <!-- Right Arrow Icon -->
            </button>
        
            <!-- Overlay Content (Remains the Same) -->
            <!--<div class="absolute bg-caa-primary top-0 h-full flex flex-col justify-center bg-opacity-50 w-full rounded-2xl">-->
            <!--    <div class="mx-auto">-->
            <!--        <div class="text-center text-gray-100">-->
            <!--            <h1 class="font-bold text-6xl">ABOUT US</h1>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--</div>-->
        </div>
        

        @include('components.nav-about')

        <div class="flex justify-between gap-2 my-10 grid grid-cols-1 md:grid-cols-2" id="history-section">
            <div class="flex-1  rounded-lg relative">
                <img class="w-full max-[700]: object-cover rounded-lg" src="/assets/img/teams.jpg" alt="">
                <div class="absolute top-0 flex w-full bg-caa-primary bg-opacity-50 rounded-tl-lg rounded-tr-lg">
                    <p class="py-20 mx-auto w-full text-center font-semibold text-2xl text-white uppercase">
                        History About our Company
                    </p>
                </div>
            </div>
            <div class="flex-1 bg-slate-50 rounded-lg flex flex-col gap-4 p-4" id="history-content">
                <ol class="relative border-l border-gray-200 dark:border-gray-900">
                    @foreach ($companyHistory as $history)
                        <li class="mb-10 ml-4">
                            <div
                                class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -left-1.5 border border-white dark:border-gray-200 dark:bg-primary">
                            </div>
                            <time
                                class="mb-1 text-lg font-semibold leading-none text-caa-primary">{{ $history->tahun }}</time>
                            <p class="mb-4 text-base font-normal text-gray-800 dark:text-gray-600 text-justify">In the
                                {!! $history->descripiton !!}</p>
                        </li>
                    @endforeach
                </ol>
            </div>
        </div>

        <div class="flex justify-between gap-2 my-10 grid grid-cols-1 md:grid-cols-2" id="vision-mission-section">
            <div class="flex-1 rounded-lg relative">
                <img class="w-full max-[700]: object-cover rounded-lg" src="/assets/img/teams.jpg" alt="">
                <div class="absolute top-0 flex w-full bg-caa-primary bg-opacity-50 rounded-tl-lg rounded-tr-lg">
                    <p class="py-20 mx-auto w-full text-center font-semibold text-2xl text-white uppercase">
                        Vision & Mission
                    </p>
                </div>
            </div>
            <div class="flex-1 bg-slate-50 rounded-lg flex flex-col gap-4 p-4" id="visi-misi-content">
                <div class="flex flex-col gap-3">
                    <p class="underline text-3xl">Vision</p>
                    <div class="text-justify text-base">
                        {!! $visi->content !!}
                    </div>
                </div>

                <div class="flex flex-col gap-3">
                    <p class="underline text-3xl">Mission</p>
                    <div class="text-justify text-base">
                        {!! $misi->content !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="flex justify-between gap-2 my-10 grid grid-cols-1 md:grid-cols-2" id="who-we-are-section">
            <div class="flex-1 bg-slate-50 rounded-lg relative">
                <img class="w-full max-[700]: object-cover rounded-lg" src="/assets/img/teams.jpg" alt="">
                <div class="absolute top-0 flex w-full bg-caa-primary bg-opacity-50 rounded-tl-lg rounded-tr-lg">
                    <p class="py-20 mx-auto w-full text-center font-semibold text-2xl text-white uppercase">
                        Our Wonderful Teams
                    </p>
                </div>
            </div>
            <div class="flex-1 bg-slate-50 rounded-lg flex flex-col gap-4 p-4" id="who-we-are-content">
                <h2 class="text-2xl font-semibold text-gray-700">Board Of Director</h2>
                {!! $content->content !!}
            </div>
        </div>



        <div class="flex justify-between gap-2 my-20">
            <div class="flex-1 bg-slate-50 rounded-lg flex flex-col gap-10 p-10 py-20">
                <img class=" px-20 object-cover "
                    src="/assets/img/logo-caa.png" alt="image">
                <div class="max-w-screen-lg mx-auto py-8 text-gray-800 ">
                    <div class="m-8 flex flex-col gap-5">
                        <div>
                            <h2 class="text-3xl text-gray-700">{{ $intro->title }}</h2>
                            <span class="text-xl text-primary italic ">Trusted partner and authorized distributor for the
                                best
                                brand
                                and product in Water Technologies
                            </span>
                        </div>
                        <p class=" text-gray-900 text-lg text-justify "> {!! $intro->content !!}</p>
                    </div>
                </div>
                <hr>
                <div>
                    <h2 class="text-3xl text-primary font-semibold">Contact Us</h2>
                </div>
                <div class="max-w-screen-xl grid grid-cols-1 md:grid-cols-3 mx-5 md:mx-auto gap-4 content-star">
                    <div class="col-span-2 rounded-lg ">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.808459719043!2d106.66864958843387!3d-6.156402489828902!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f9cee62cceb7%3A0xba6a22f075f405fb!2sPT.%20Cipta%20Aneka%20Air!5e0!3m2!1sid!2sid!4v1631502375900!5m2!1sid!2sid"
                            width="100%" height="300" class="rounded-lg drop-shadow" style="border:0;"
                            allowfullscreen="" loading="lazy"></iframe>
                    </div>

                    <div class="flex flex-col justify-center">
                        <div class=" ">
                            <img class=" max-h-60 -mt-20" src="/assets/img/maps.png" alt="">
                            <div class="flex ">
                                <i class="fas fa-map pr-2 pt-2"></i>
                                <p class="text-gray-700 text-justify ">
                                    {{ $companyInfo->company_address }}
                                </p>
                            </div>
                            <br>
                            <a href="tel:{{ $companyInfo->company_phone }}" class="text-gray-700 py-2">
                                <i class="fa fa-phone"></i>&nbsp;&nbsp; {{ $companyInfo->company_phone }}
                            </a><br>
                            <a href="mailto:{{ $companyInfo->company_email }}" class="text-gray-700 py-2">
                                <i class="fa fa-envelope-open"></i>&nbsp;&nbsp; {{ $companyInfo->company_email }}
                            </a>
                            <br>
                            <a href="https://www.instagram.com/ciptaanekaair/" target="_blank" class="text-gray-700 py-2">
                                <i class="fa fa-instagram"></i>&nbsp;&nbsp; {{ '@ciptaanekaair' }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>



    <script>
        const historySection = document.getElementById("history-section");
        const visiMisiSection = document.getElementById("vision-mission-section");
        const whoWeAreSection = document.getElementById("who-we-are-section");

        const arraySection = [historySection, visiMisiSection, whoWeAreSection]

        document.addEventListener("DOMContentLoaded", function() {
            arraySection.forEach(element => {
                element.classList.add("hidden")
            });

            const carouselWrapper = document.querySelector('#carousel > div');
            const nextButton = document.getElementById('nextButton');
            const prevButton = document.getElementById('prevButton');

            console.log('carouselWrapper:', carouselWrapper);
            console.log('nextButton:', nextButton);
            console.log('prevButton:', prevButton);

            if (!carouselWrapper || !nextButton || !prevButton) {
                console.error('One or more elements are missing.');
                return;
            }

            const images = carouselWrapper.children;
            const totalImages = images.length;
            let index = 0;

            function updateCarousel() {
                const offset = -index * 100;
                carouselWrapper.style.transform = `translateX(${offset}%)`;
            }

            nextButton.addEventListener('click', function () {
                console.log('Next button clicked');
                index = (index + 1) % totalImages;
                updateCarousel();
            });

            prevButton.addEventListener('click', function () {
                console.log('Previous button clicked');
                index = (index - 1 + totalImages) % totalImages;
                updateCarousel();
            });

            updateCarousel();

        });


        const arrows = ['history-arrow', 'vision-mission-arrow', 'who-we-are-arrow'];

        function toggleContent(section) {
            const content = document.getElementById(`${section}`);
            const arrow = document.getElementById(`${section}-arrow`);
            const sectionHtml = document.getElementById(`${section}-section`);

            arraySection.forEach(element => {
                element.classList.add("hidden")
            });

            arrows.forEach(ar => {
                if(arrow.id == ar){

                }
            });

            content.classList.toggle('oke');

            if (content.classList.contains('oke')) {
                arrow.classList.remove('fa-arrow-up');
                arrow.classList.add('fa-arrow-down');
                sectionHtml.classList.remove('hidden');
                sectionHtml.classList.add('visible');
            } else {
                arrow.classList.remove('fa-arrow-down');
                arrow.classList.add('fa-arrow-up');
                sectionHtml.classList.remove('visible');
                sectionHtml.classList.add('hidden');
            }
        }
    </script>
@endsection
