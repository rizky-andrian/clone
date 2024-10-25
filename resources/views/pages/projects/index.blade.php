@extends('layouts.front')

@section('konten')
    <div class=" max-w-screen-lg mx-auto my-10 flex flex-col gap-10 ">

        {{-- Latest Projects --}}
        <div class="flex flex-col ">
            <h2
                class="p-2 mb-3 text-left text-xl text-gray-800 font-bold underline underline-offset-8 decoration-caa-primary">
                List Of Project
            </h2>
            <div class="p-3 grid grid-flow-col grid-cols-12  max-w-screen-xl rounded-lg mx-auto bg-slate-100 w-full gap-3">
                <div class="col-span-3 w-full  flex justify-end">
                    <form class="w-full" action="">
                        <select name="" id="" class=" p-2 rounded-lg drop-shadow-lg w-full ">
                            <option value="">On Going Projects</option>
                            <option value="">Finish Projects</option>
                        </select>
                    </form>
                </div>
                <div class="col-span-9 w-full">
                    <div class="p-3 bg-white drop-shadow-lg rounded-lg">
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-100 uppercase bg-caa-primary rounded-lg ">
                                    <tr class="">
                                        <th scope="" class="px-6 py-3 rounded-tl-lg w-10">
                                            Project Names
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Customer
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Project Details
                                        </th>
                                        <th scope="col" class="px-6 py-3 rounded-tr-lg ">
                                            Years
                                        </th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($Project as $Pitem)
                                        <tr class="bg-white border-b  text-gray-900  hover:bg-gray-50">
                                            <td class="px-6 py-4  w-56 ">
                                                {{ $Pitem->project_name }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $Pitem->customer->customer_name }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $Pitem->project_desc }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ date('Y', strtotime($Pitem->project_year)) }}
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
    </div>
@endsection
