@extends('layouts.front')

@section('konten')
    <div class="max-w-screen-lg mx-auto my-10 flex flex-col gap-10">
        
        {{-- On Going Projects Section --}}
        <div class="flex flex-col">
            <h2 class="p-2 mb-3 text-left text-xl text-gray-800 font-bold underline underline-offset-8 decoration-caa-primary">
                On Going Projects
            </h2>
            <div class="p-3 bg-slate-100 rounded-lg mx-auto w-full">
                <div class="p-3 bg-white drop-shadow-lg rounded-lg">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-gray-500">
                            <thead class="text-xs text-gray-100 uppercase bg-caa-primary rounded-lg">
                                <tr>
                                    <th scope="col" class="px-6 py-3 rounded-tl-lg w-10">Project Names</th>
                                    <th scope="col" class="px-6 py-3">Customer</th>
                                    <th scope="col" class="px-6 py-3">Project Details</th>
                                    <th scope="col" class="px-6 py-3">Years</th>
                                    <th scope="col" class="px-6 py-3 rounded-tr-lg">Pictures</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($Project->where('type', 'on-going') as $Pitem)
                                    <tr class="bg-white border-b text-gray-900 hover:bg-gray-50">
                                        <td class="px-6 py-4 w-56">{{ $Pitem->project_name }}</td>
                                        <td class="px-6 py-4">{{ $Pitem->customer->customer_name }}</td>
                                        <td class="px-6 py-4">{{ $Pitem->project_desc }}</td>
                                        <td class="px-6 py-4">{{ date('Y', strtotime($Pitem->project_year)) }}</td>
                                        <td class="h-32">
                                            <img 
                                                class="object-cover h-24 w-40 cursor-pointer rounded-lg clickable-image" 
                                                src="/storage/img/project/{{ $Pitem->project_gambar }}" 
                                                alt="{{ $Pitem->project_name }}">
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        {{-- Finished Projects Section --}}
        <div class="flex flex-col">
            <h2 class="p-2 mb-3 text-left text-xl text-gray-800 font-bold underline underline-offset-8 decoration-caa-primary">
                Finished Projects
            </h2>
            <div class="p-3 bg-slate-100 rounded-lg mx-auto w-full">
                <div class="p-3 bg-white drop-shadow-lg rounded-lg">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-gray-500">
                            <thead class="text-xs text-gray-100 uppercase bg-caa-primary rounded-lg">
                                <tr>
                                    <th scope="col" class="px-6 py-3 rounded-tl-lg w-10">Project Names</th>
                                    <th scope="col" class="px-6 py-3">Customer</th>
                                    <th scope="col" class="px-6 py-3">Project Details</th>
                                    <th scope="col" class="px-6 py-3">Years</th>
                                    <th scope="col" class="px-6 py-3 rounded-tr-lg">Pictures</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($Project->where('type', 'finished') as $Pitem)
                                    <tr class="bg-white border-b text-gray-900 hover:bg-gray-50">
                                        <td class="px-6 py-4 w-56">{{ $Pitem->project_name }}</td>
                                        <td class="px-6 py-4">{{ $Pitem->customer->customer_name }}</td>
                                        <td class="px-6 py-4">{{ $Pitem->project_desc }}</td>
                                        <td class="px-6 py-4">{{ date('Y', strtotime($Pitem->project_year)) }}</td>
                                        <td class="h-32">
                                            <img 
                                                class="object-cover h-24 w-40 cursor-pointer rounded-lg clickable-image" 
                                                src="/storage/img/project/{{ $Pitem->project_gambar }}" 
                                                alt="{{ $Pitem->project_name }}">
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Full-Screen Modal -->
    <div id="imageModal" class="fixed top-0 left-0 w-full h-full bg-black bg-opacity-75 hidden z-50 flex justify-center items-center" aria-hidden="true">
        <div class="relative">
            <button onclick="closeFullScreenImage()" class="absolute top-2 right-2 bg-white text-black p-2 rounded-full" aria-label="Close full-screen image">
                &times;
            </button>
            <img id="modalImage" class="max-w-full max-h-screen object-contain" alt="Full-screen project image">
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        console.log('Script loaded!');
        document.addEventListener('DOMContentLoaded', () => {
            const images = document.querySelectorAll('.clickable-image');
            console.log('Images found:', images.length); // Check how many images are found

            images.forEach((img, index) => {
                console.log(`Binding click event to image ${index + 1} with src: ${img.src}`);
                img.addEventListener('click', () => {
                    console.log('Image clicked:', img.src); // Log when an image is clicked
                    openFullScreenImage(img.src);
                });
            });
        });
        function openFullScreenImage(imageSrc) {
            const modal = document.getElementById('imageModal');
            const modalImage = document.getElementById('modalImage');

            if (!modal || !modalImage) {
                console.error('Modal or Modal Image element not found');
                return;
            }

            modalImage.src = imageSrc;
            modal.classList.remove('hidden');
            modal.classList.add('active'); // Add animation class
            console.log('Opened full screen image:', imageSrc);
        }

        function closeFullScreenImage() {
            const modal = document.getElementById('imageModal');

            if (!modal) {
                console.error('Modal element not found');
                return;
            }

            modal.classList.remove('active'); // Remove animation class
            modal.classList.add('hidden');
            console.log('Closed full screen image');
        }
    </script>
@endsection

@section('styles')
    <style>
        #imageModal {
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease, visibility 0.3s ease;
        }

        #imageModal.active {
            opacity: 1;
            visibility: visible;
        }

        #modalImage {
            transform: scale(0.95);
            transition: transform 0.3s ease;
        }

        #imageModal.active #modalImage {
            transform: scale(1);
        }
        #imageModal.hidden {
            display: none;
        }

        #imageModal.active {
            display: flex;
            opacity: 1;
            visibility: visible;
            transition: opacity 0.3s ease, visibility 0.3s ease;
        }
    </style>
@endsection