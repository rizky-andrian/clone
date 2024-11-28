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
                    <h2 class=" text-sm md:text-xl text-gray-700 font-semibold">IT Support</h2>
                    <div class="flex justify-end gap-6">
                        <!-- Apply Now Button -->
                        <a href="mailto:laras@ciptaanekaair.co.id?subject=(Nama Anda)_ITSUPPORT" class="bg-caa-primary hover:bg-caa-secondary text-sm md:text-xl text-gray-100 px-3 py-1 rounded-lg transition flex items-center" aria-label="Send application email">
                            Apply Now
                        </a>

                        <a 
                            href="https://wa.me/6282383900332?text=Halo%0A%0ASaya%20tertarik%20untuk%20melamar%20kerja%20di%20PT.%20Cipta%20Aneka%20Air%20sebagai%20IT%20Support.%0A%0ABerikut%20CV%20dan%20Portofolio%20saya%0A%0ATerima%20Kasih."
                            class="bg-green-500 hover:bg-green-600 text-sm md:text-xl text-white px-3 py-1 rounded-lg transition flex items-center"
                            target="_blank"
                            rel="noopener noreferrer"
                            aria-label="Contact us on WhatsApp"
                        >
                            <i class="fab fa-whatsapp mr-2"></i> Contact Us
                        </a>
                    
                        <!-- Icon Button -->
                        <button class="bg-caa-primary hover:bg-caa-secondary text-sm md:text-xl text-gray-100 px-3 py-1 rounded-lg transition" aria-label="Download">
                            <i class="fas fa-arrow-down"></i>
                        </button>
                    </div>

                </div>
                <div class="px-5 pb-5 py-1">
                    <hr>
                    <div class="flex flex-col gap-3">
                        {{-- <div class="flex flex-col gap-2">
                            <h2 class="text-xs md:text-lg font-semibold text-gray-700">Job Highlights</h2>
                            <li class="text-xs md:text-lg">
                                Working with Multinational Colleague
                            </li>
                            <li class="text-xs md:text-lg">
                                Career as a Finance Manager
                            </li>
                        </div> --}}

                        <div class="flex flex-col gap-2">
                            <h2 class="text-xs md:text-lg font-semibold" font-semibold text-gray-700">Requirement: </h2>
                            <li class="text-xs md:text-lg">Pria</li>
                            <li class="text-xs md:text-lg">Maksimal 30 Tahun</li>
                            <li class="text-xs md:text-lg">Pendidikan minimal SMK Jurusan Teknik Komputer dan Jaringan, D3/S1 Teknik Informatika</li>
                            <li class="text-xs md:text-lg">Fresh Graduate di persilahkan</li>
                            <li class="text-xs md:text-lg">Menguasai Microsoft Office</li>
                            <li class="text-xs md:text-lg">Memahami konsep dasar Jaringan Komputer</li>
                            <li class="text-xs md:text-lg">Menguasai troubleshooting komputer, termasuk software, hardware, printer, LAN/networking, PABX, dan alat operasional terkait.</li>
                            <li class="text-xs md:text-lg">Dapat bekerja dalam sebuah tim</li>
                            <li class="text-xs md:text-lg">Mengetahui dasar software design seperti Photoshop/Illustrator</li>
                        </div>

                        <div class="flex flex-col gap-2">
                            <h2 class="text-xs md:text-lg font-semibold" font-semibold text-gray-700">Opsional/Nilai Tambahan: </h2>
                            <li class="text-xs md:text-lg">Mengerti Dasar Pemrograman Web</li>
                            <li class="text-xs md:text-lg">Cekatan dan Menyukai Hal Baru</li>
                            <li class="text-xs md:text-lg">Memiliki Pengetahuan Mengenai Software ERP</li>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    {{-- END Latest Produk --}}
</div>
@endsection