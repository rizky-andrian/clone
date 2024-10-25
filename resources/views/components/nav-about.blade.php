<div class="flex justify-center grid grid-cols-1 md:grid-cols-3 gap-2">
    <a href="/about-us/our-history" class="h-10 md:h-16 drop-shadow-lg rounded-lg flex flex-col justify-center   hover:bg-white hover:text-caa-primary @if (url()->current() == env('APP_URL') . '/about-us/our-history') text-caa-primary bg-white @else text-white bg-caa-primary @endif ">
        <div class=" px-1 md:px-8 text-xs md:text-xl ">
            <p> <i class="fas fa-history"></i> Our History
                {{ url()->current() == env('APP_URL') . '/about-us/our-history' }}
            </p>
        </div>
    </a>
    <a href="/about-us/vision-mission" class="h-10 md:h-16 drop-shadow-lg rounded-lg flex flex-col justify-center  hover:bg-white hover:text-caa-primary @if (url()->current() == env('APP_URL') . '/about-us/vision-mission') text-caa-primary bg-white @else text-white bg-caa-primary @endif ">
        <div class="px-1 md:px-8 text-xs md:text-xl  ">
            <p> <i class="fas fa-chevron-up"></i> Our Vision & Mission</p>
        </div>
    </a>
    <a href="/about-us/who-we-are" class="h-10 md:h-16 drop-shadow-lg rounded-lg flex flex-col justify-center  hover:bg-white hover:text-caa-primary @if (url()->current() == env('APP_URL') . '/about-us/who-we-are') text-caa-primary bg-white @else text-white bg-caa-primary @endif ">
        <div class=" px-1 md:px-8 text-xs md:text-xl ">
            <p> <i class="fas fa-user-tie"></i> Who We Are</p>
        </div>
    </a>
</div>