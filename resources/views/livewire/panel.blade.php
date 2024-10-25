<div class="max-w-screen-lg mx-auto">
    <div class="max-w-screen-md mx-auto py-2 tablet:m-3">
        <div class="hidden hape:flex hape:flex-col hape:gap-3 w-full">
            <div class="flex-1  max-h-14 overflow-hidden rounded-tl-xl rounded-br-xl bg-primary w-full">
                <div class="my-1 mx-2 flex gap-2">
                    <div class="my-auto">
                        <div
                            class="h-8 w-8 bg-white hape:m-0 rounded-full m-5 hape:flex hape:flex-col hape:justify-center">
                            <span class="font-primary text-center font-bold text-primary">1</span>
                        </div>
                    </div>
                    <div class="my-auto">
                        <div class="h-8 w-full rounded-full my-2 hape:flex hape:flex-col hape:justify-center ">
                            <h2 class="font-primary font-bold hape:text-white hape:text-xs">
                                {{ $dataPanel[0]->title }}
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex-1  max-h-14 overflow-hidden rounded-tl-xl rounded-br-xl bg-secondary w-full">
                <div class="my-1 mx-2 flex gap-2">
                    <div class="my-auto">
                        <div
                            class="h-8 w-8 bg-white hape:m-0 rounded-full m-5 hape:flex hape:flex-col hape:justify-center">
                            <span class="font-primary text-center font-bold text-secondary">2</span>
                        </div>
                    </div>
                    <div class="my-auto">
                        <div class="h-8 w-full rounded-full my-2 hape:flex hape:flex-col hape:justify-center">
                            <h2 class="font-primary font-bold text-white hape:text-xs">
                                {{ $dataPanel[1]->title }}
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex-1  max-h-14 overflow-hidden rounded-tl-xl rounded-br-xl bg-primary w-full">
                <div class="my-1 mx-2 flex gap-2">
                    <div class="my-auto">
                        <div
                            class="h-8 w-8 bg-white hape:m-0 rounded-full m-5 hape:flex hape:flex-col hape:justify-center">
                            <span class="font-primary text-center font-bold text-primary">3</span>
                        </div>
                    </div>
                    <div class="my-auto">
                        <div class="h-8 w-full rounded-full my-2 hape:flex hape:flex-col hape:justify-center">
                            <h2 class="font-primary font-bold text-white hape:text-xs">
                                {{ $dataPanel[2]->title }}
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex-1  max-h-14 overflow-hidden rounded-tl-xl rounded-br-xl bg-secondary w-full">
                <div class="my-1 mx-2 flex gap-2">
                    <div class="my-auto">
                        <div
                            class="h-8 w-8 bg-white hape:m-0 rounded-full m-5 hape:flex hape:flex-col hape:justify-center">
                            <span class="font-primary text-center font-bold text-secondary">4</span>
                        </div>
                    </div>
                    <div class="my-auto">
                        <div class="h-8 w-full rounded-full my-2 hape:flex hape:flex-col hape:justify-center">
                            <h2 class="font-primary font-bold text-white hape:text-xs">
                                {{ $dataPanel[3]->title }}
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="hape:hidden grid grid-rows-2 grid-flow-col grid-cols-2 h-96 gap-5">
            <div class="grid-cols-1">
                <div class="bg-secondary overflow-hidden rounded-bl-3xl rounded-tr-3xl mt-7 ">
                    <div class="m-5">
                        <div class="flex justify-end">
                            <div class="w-10 h-10 border-4 border-primary rounded-full">
                                <h1 class="text-xl font-bold text-center text-white">1</h1>
                            </div>
                        </div>
                        <div class="text-center flex flex-col gap-1">
                            <h1 class="text-lg text-primary uppercase font-bold leading-5">
                                {{ $dataPanel[0]->title }}
                            </h1>
                            <p class="text-sm">
                                {{ $dataPanel[0]->description }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid-cols-1 ">
                <div class="bg-primary overflow-hidden rounded-br-3xl rounded-tl-3xl">
                    <div class="m-5">
                        <div class="w-10 h-10 border-4 border-white rounded-full">
                            <h1 class="text-xl font-bold text-center text-white">3</h1>
                        </div>
                        <div class="text-center">
                            <p class="text-sm text-secondary">
                                {{ $dataPanel[1]->description }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid-cols-1 ">
                <div class="m-1 mt-14 bg-primary overflow-hidden  rounded-br-3xl rounded-tl-3xl">
                    <div class="m-5">
                        <div class="w-10 h-10 border-4 border-white rounded-full">
                            <h1 class="text-xl font-bold text-center text-white">2</h1>
                        </div>
                        <div class="text-center">
                            <p class="text-sm text-secondary">
                                {{ $dataPanel[3]->description }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid-cols-1">
                <div class="m-1 bg-secondary overflow-hidden  rounded-bl-3xl rounded-tr-3xl">
                    <div class="m-5">
                        <div class="flex justify-end">
                            <div class="w-10 h-10 border-4 border-primary rounded-full">
                                <h1 class="text-xl font-bold text-center text-white">4</h1>
                            </div>
                        </div>
                        <div class="text-center flex flex-col gap-1">
                            <h1 class="text-lg text-primary uppercase font-bold leading-5">
                                {{ $dataPanel[2]->title }}
                            </h1>
                            <p class="text-sm">
                                {{ $dataPanel[2]->description }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
