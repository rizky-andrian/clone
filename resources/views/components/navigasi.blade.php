<div>
    <div class="relative">
        <div
            class="w-56 h-screen absolute right-0 top-10 z-10 rounded-tl-lg rounded-bl-lg drop-shadow-lg bg-primary hidden">
            <div class="my-1
            mx-2 flex justify-between mt-4">
                <div>
                    <button class="h-8 w-8 bg-white rounded-full flex justify-center">
                        <span class="text-lg font-bold text-primary text-center">x</span>
                    </button>
                </div>
                <div class="text-white my-auto text-sm">
                    <span>MENU</span>
                </div>
            </div>
            <hr class="my-2 mx-2" />
            <div class="mx-2">
                <div class="my-auto">
                    <ul class="flex flex-col gap-4 text-base font-semibold text-white">
                        <li class="">
                            <a href="/">Beranda</a>
                        </li>
                        <li>
                            <a href="/servis">Servis</a>
                        </li>
                        <li>
                            <a href="/news">News</a>
                        </li>
                        <li>
                            <a href="/about">About</a>
                        </li>
                        <li>
                            <a href="/contact">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="bg-white mt-5">
            <div class="flex flex-col justify-start ">
                <div class="container mx-auto max-w-screen-xl hape:hidden">
                    <div class="container mx-auto ">
                        <div class="flex py-7 justify-between  ">
                            <div class="flex  flex-1 h-28 flex-col justify-center  ">
                                <div class="flex ">
                                    <a href="/" class="">
                                        <div class=" ">
                                            <img class="  max-h-16  cursor-pointer mx-3"
                                                src="{{ '/storage/img/company/' . $companyInfo->company_logo }}"
                                                alt="{{ $companyInfo->company_name }}" />
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class=" relative flex-1 my-auto h-full  ">
                                <form action="/products/search-product" class="flex w-full gap-2" method="POST">
                                    @csrf
                                    <input onfocus="searchTabOpen()"
                                        class="border-2 border-primary  px-4 rounded-full py-2  focus:outline-1 focus:outline-primary  w-full "
                                        name="product-search" type="search" placeholder="Search Product" required>
                                    <button type="submit"
                                        class="px-6 py-2 bg-primary text-gray-100 rounded-full">Search</button>
                                </form>
                            </div>
                            <div class="flex flex-1  h-full my-auto justify-end">
                                <div class=" flex flex-col text-caa-primary font-normal ">
                                    <div class="font-semibold gap-2">
                                        <a href="tel:{{ $companyInfo->company_phone }}">
                                            <i class="fas fa-phone my-auto"></i>
                                            {{ $companyInfo->company_phone }}
                                        </a>
                                    </div>
                                    <div class="flex gap-2  ">
                                        <a href="mailto:{{ $companyInfo->company_email }}">
                                            <i class="fas fa-envelope my-auto"></i>
                                            {{ $companyInfo->company_email }}
                                        </a>
                                    </div>
                                    <div class="flex gap-2  ">
                                        <a href="https://www.instagram.com/ciptaanekaair/" target="_blank">
                                            <i class="fab fa-instagram my-auto"></i>
                                            {{ 'ciptaanekaair' }}
                                        </a>
                                    </div>
                                    <div class="flex gap-2  ">
                                        <a href="https://www.linkedin.com/in/cipta-aneka-air-b87409298/"
                                            target="_blank">
                                            <i class="fab fa-linkedin my-auto"></i>
                                            {{ 'PT.Cipta Aneka Air' }}
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="w-full h-full">
                        <img class="object-cover w-full h-full" src="/assets/img/headerbg.jpg" alt="">
                    </div>

                    <div class="flex justify-between max-w-screen-lg mx-auto">
                        <a href="/"
                            class="flex flex-col font-primary text-caa-primary border-l-2 border-caa-primary pl-3  @if (url()->current() == env('APP_URL')) border-b-4 @endif pb-3">
                            <div class="text-lg font-semibold">Home</div>
                            <span class=" text-sm font-italic italic ">Introduction</span>
                        </a>

                        <a href="/about-us"
                            class="flex flex-col font-primary text-caa-primary border-l-2 border-caa-primary pl-3  @if (url()->current() == env('APP_URL') . '/about-us' || Str::startsWith(url()->current(), env('APP_URL') . '/about-us')) border-b-4) border-b-4 @endif">
                            <div class="text-lg font-semibold">About Us</div>
                            <span class=" text-sm font-italic italic ">Our Company Profile</span>
                        </a>
                        <a href="/products"
                            class="flex flex-col font-primary text-caa-primary border-l-2 border-caa-primary pl-3 @if (url()->current() == env('APP_URL') . '/products' || Str::startsWith(url()->current(), env('APP_URL') . '/products')) border-b-4) border-b-4 @endif">
                            <div class="text-lg font-semibold">Product</div>
                            <span class=" text-sm font-italic italic ">Our Products</span>
                        </a>
                        <a href="https://ciptaanekaservis.co.id/" target="_blank"
                            class="flex flex-col font-primary text-caa-primary border-l-2 border-caa-primary pl-3">
                            <div class="text-lg font-semibold">Services</div>
                            <span class=" text-sm font-italic italic ">Our Services</span>
                        </a>
                        <a href="/projects"
                            class="flex flex-col font-primary text-caa-primary border-l-2 border-caa-primary pl-3 @if (url()->current() == env('APP_URL') . '/projects' || Str::startsWith(url()->current(), env('APP_URL') . '/projects')) border-b-4) border-b-4 @endif">
                            <div class="text-lg font-semibold">Projects</div>
                            <span class=" text-sm font-italic italic ">Our Experience</span>
                        </a>
                        <a href="/hiring"
                            class="flex flex-col font-primary text-caa-primary border-l-2 border-caa-primary pl-3 @if (url()->current() == env('APP_URL') . '/hiring' || Str::startsWith(url()->current(), env('APP_URL') . '/hiring')) border-b-4) border-b-4 @endif">
                            <div class="text-lg font-semibold">Careers</div>
                            <span class=" text-sm font-italic italic ">We Are Hiring</span>
                        </a>
                    </div>
                </div>
                <div class="hidden hape:flex hape:justify-between h-12 mx-3 ">
                    <div class="max-h-12 flex justify-start  my-auto">
                        <a href="/">
                            <img class="max-h-12 tablet:max-h-12 cursor-pointer p-2"
                                src="{{ '/storage/img/company/' . $companyInfo->company_logo }}"
                                alt="{{ $companyInfo->company_name }}" /></a>
                        <h1 class=" font-bold text-1xl my-auto">{{ $companyInfo->company_name }}
                        </h1>
                    </div>
                    <div class="my-auto ">
                        <button onclick="openModalBar()">
                            <i class="fas fa-bars fa-1x font-thin text-xl"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
