@extends('layouts.front')

@section('konten')
<div class=" max-w-screen-lg mx-auto my-5 flex flex-col gap-10 p-3">
    {{-- Hirring Banner --}}
    <div class="bg-slate-100 drop-shadow-lg h-auto md:h-slider rounded-2xl ">
        <img class="h-full w-full object-contain rounded-3xl" src="/assets/img/hiring.jpg" alt="">
    </div>
    {{-- End Hirring Banner --}}

    {{-- Latest Projects --}}
    <div class="flex flex-col gap-3 ">
        <h2 class="text-left text-sm md:text-xl font-semibold text-gray-800">Available Position</h2>

        <div class="flex flex-col gap-2">

            <div class="bg-white drop-shadow-lg rounded-lg">
                <div class="p-5 flex justify-between ">
                    <h2 class=" text-sm md:text-xl text-gray-700 font-semibold">Accounting & Finance</h2>
                    <div class="flex justify-end gap-6">
                        <button class=" bg-caa-primary text-sm md:text-xl text-gray-100 px-3 py-1 rounded-lg ">Apply Now</button>
                        <button> <i class="fas fa-arrow-down"></i> </button>
                    </div>

                </div>
                <div class="px-5 pb-5 py-1">
                    <hr>
                    <div class="flex flex-col gap-3">
                        <div class="flex flex-col gap-2">
                            <h2 class="text-xs md:text-lg font-semibold text-gray-700">Job Highlights</h2>
                            <li class="text-xs md:text-lg">
                                Working with Multinational Colleague
                            </li>
                            <li class="text-xs md:text-lg">
                                Career as a Finance Manager
                            </li>
                        </div>

                        <div class="flex flex-col gap-2">
                            <h2 class="text-xs md:text-lg" font-semibold text-gray-700">Technical Skills:</h2>
                            <li class="text-xs md:text-lg">Degree or equivalent professional qualification in IT and finance.</li>
                            <li class="text-xs md:text-lg">Through knowledge of ERP systems and database administration</li>
                            <li class="text-xs md:text-lg">Hands on experience dealing with day-to-day troubleshooting of IT issues in a large
                                organization</li>
                            <li class="text-xs md:text-lg">Understanding the requirements of the stakeholders and the ability to suggest sortable
                                solutions.</li>
                            <li class="text-xs md:text-lg">Strong communication skills to work with all levels of employees in the organization.
                            </li>
                            <li class="text-xs md:text-lg">Strong technical skills in IT systems such as SAP/Microsoft/HRIS</li>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
    {{-- END Latest Produk --}}
</div>
@endsection