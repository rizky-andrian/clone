<div class="w-full bg-primary-color-mtma h-auto hape:-mt-28 hape:mx-3 ">
    <div class="flex flex-col justify-center gap-5 h-full my-10">
        <div class="flex flex-col text-primary">
            <div class="text-center font-semibold text-2xl ">
                <h2>Our Customers</h2>
            </div>
            <span class="text-center text-xs font-semibold"><i>Our Amazing Customers</i></span>
        </div>

        <div class="mx-auto max-w-screen-lg grid grid-flow-row hape:grid-cols-2 grid-cols-4 gap-3">
            @foreach ($customers as $customer)
                <div
                    class=" h-44  w-44  bg-white drop-shadow-md  rounded-tl-custpanel rounded-br-3xl   overflow-hidden flex flex-col justify-center">
                    <img class=" mx-auto p-8   " src="{{ '/storage/img/customer/' . $customer->customer_logo }}"
                        alt="">
                </div>
            @endforeach
        </div>
    </div>

</div>
