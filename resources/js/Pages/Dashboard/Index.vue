<template>
    <div class="p-3 rounded-xl bg-white flex flex-col gap-4">
        <div class="grid grid-flow-col grid-cols-4 gap-4">
            <div
                class="h-32 bg-bg-primary rounded-md flex flex-col justify-center"
            >
                <div
                    class="flex justify-center hape:flex-col hape:justify-center gap-3"
                >
                    <div class="my-auto hape:mx-auto">
                        <i class="fas fa-boxes fa-2x text-blue-900"></i>
                    </div>
                    <div class="flex flex-col">
                        <div
                            class="font-semibold text-center text-gray-500 text-4xl"
                        >
                            {{ produk }}
                        </div>
                        <div class="text-xs text-center text-gray-400">
                            <span>Produk</span>
                        </div>
                    </div>
                </div>
            </div>
            <div
                class="h-32 bg-bg-primary rounded-md flex flex-col justify-center"
            >
                <div
                    class="flex justify-center hape:flex-col hape:justify-center gap-3"
                >
                    <div class="my-auto hape:mx-auto">
                        <i class="fas fa-users fa-2x text-secondary-color"></i>
                    </div>
                    <div class="flex flex-col">
                        <div
                            class="font-semibold text-center text-gray-500 text-4xl"
                        >
                            {{ visitor }}
                        </div>
                        <div class="text-xs text-center text-gray-400">
                            <span>Visitors</span>
                        </div>
                    </div>
                </div>
            </div>
            <div
                class="h-32 bg-bg-primary rounded-md flex flex-col justify-center"
            >
                <div
                    class="flex justify-center hape:flex-col hape:justify-center gap-3"
                >
                    <div class="my-auto hape:mx-auto">
                        <i class="fas fa-box fa-2x text-red-400"></i>
                    </div>
                    <div class="flex flex-col">
                        <div
                            class="font-semibold text-center text-gray-500 text-4xl"
                        >
                            {{ servis }}
                        </div>
                        <div class="text-xs text-center text-gray-400">
                            <span>Services</span>
                        </div>
                    </div>
                </div>
            </div>
            <div
                class="h-32 bg-bg-primary rounded-md flex flex-col justify-center"
            >
                <div
                    class="flex justify-center hape:flex-col hape:justify-center gap-3"
                >
                    <div class="my-auto hape:mx-auto">
                        <i
                            class="fa fa-newspaper-o fa-2x text-blue-900"
                            aria-hidden="true"
                        ></i>
                    </div>
                    <div class="flex flex-col">
                        <div
                            class="font-semibold text-center text-gray-500 text-4xl"
                        >
                            {{ blog }}
                        </div>
                        <div class="text-xs text-center text-gray-400">
                            <span>Blog and News</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex hape:flex-col gap-4">
            <div
                class="flex-1 h-56 rounded-md bg-blue-400 text-white font-semibold flex flex-col justify-center p-3"
            >
                <div
                    class="flex hape:flex-col hape:overflow-scroll justify-center gap-2 mx-3"
                >
                    <img
                        class="drop-shadow-xl max-h-36 hape:hidden shadow-white"
                        :src="'./assets/img/welcome.png'"
                        alt=""
                    />
                    <div class="flex flex-col my-auto">
                        <h1 class="text-2xl hape:hidden py-3">
                            Hallo.. {{ $page.props.users.name }}
                        </h1>
                        <p class="text-sm font-thin">
                            Selamat Datang di Dashboard Website Anda
                        </p>
                        <p class="text-sm font-thin">
                            Anda bisa mengatur, Menambahkan dan Memperbaharui
                            Konten pada website anda.
                        </p>
                        <button
                            class="text-xs bg-slate-200 hape:my-0 py-1 px-3 rounded-md text-gray-900 my-5 w-32"
                        >
                            Tutorial
                        </button>
                    </div>
                </div>
            </div>
            <div
                class="flex-1 h-56 rounded-md bg-bg-primary flex flex-col gap-3 p-3 overflow-y-scroll"
            >
                <div>
                    <span class="font-semibold text-gray-700"
                        >Halaman Teratas</span
                    >
                </div>
                <div class="flex flex-col gap-2">
                    <div
                        v-for="visitor in this.visitorList"
                        class="bg-white rounded-md h-10 flex flex-col justify-center hover:bg-blue-300 hover:font-semibold hover:text-white"
                    >
                        <div class="px-3 flex justify-between">
                            <span>{{ visitor.url }}</span>
                            <span
                                class="text-sm hape:flex hape:flex-col hape:text-center"
                                ><b class="my-auto h-full">{{
                                    visitor.total_pengunjung
                                }}</b>
                                <span class="text-xs"> visitor</span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <div
                class="rounded-md bg-bg-primary h-80 relative overflow-scroll overflow-x-scroll overflow-y-hidden"
            >
                <apexchart
                    class="w-full asbolute"
                    :width="chart.width"
                    :height="chart.height"
                    :type="chart.type"
                    :options="chart.options"
                    :series="chart.series"
                ></apexchart>
            </div>
        </div>
    </div>
</template>

<script>
import Navigasi from "../Widgets/Navigasi.vue";
import DashboardLayout from "../Layouts/DashboardLayout.vue";

export default {
    components: {
        Navigasi,
        DashboardLayout,
    },
    props: {
        chart: Object,
        visitor: Number,
        produk: Number,
        servis: Number,
        blog: Number,
        visitorList: Object,
    },
    layout: DashboardLayout,
};
</script>

<style></style>
