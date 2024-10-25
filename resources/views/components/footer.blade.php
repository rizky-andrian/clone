{{-- <div class="max-w-screen-xl grid grid-cols-1 md:grid-cols-3 mx-5 md:mx-auto gap-4 content-star">
    <div class="col-span-2 rounded-lg ">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.808459719043!2d106.66864958843387!3d-6.156402489828902!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f9cee62cceb7%3A0xba6a22f075f405fb!2sPT.%20Cipta%20Aneka%20Air!5e0!3m2!1sid!2sid!4v1631502375900!5m2!1sid!2sid"
            width="100%" height="300" class="rounded-lg drop-shadow" style="border:0;" allowfullscreen=""
            loading="lazy"></iframe>
    </div>

    <div class="flex flex-col justify-center">
        <div class=" ">
            <p class="text-gray-700 text-justify ">
                {{ $companyInfo->company_address }}
            </p>
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
</div> --}}
{{-- @php
    $year = date('Y');
@endphp
<div class="text-center">
    Copyright @ {{ $year }} <b>PT.Cipta Aneka Air</b>
</div> --}}
{{-- Authorized Dstributor --}}
<div class="">
    @include('components.brand')

</div>
{{-- END Authorized Dstributor --}}
