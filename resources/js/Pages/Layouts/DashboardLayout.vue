<template>
    <div class="h-screen w-full">
        <div
            class="grid grid-flow-col grid-cols-12 bg-white border border-gray-200"
        >
            <div class="col-span-2">
                <div
                    class="h-10 py-8 overflow-hidden flex flex-col justify-center hape:hidden"
                >
                    <div class="mx-auto flex justify-center h-max gap-1">
                        <img class="max-h-8" :src="'/assets/img/logo.png'" />
                        <span
                            class="font-base text-gray-800 text-2xl font-semibold"
                            >Atresna.</span
                        >
                    </div>
                </div>
                <div
                    class="h-10 py-8 overflow-hidden hape:flex flex-col justify-center hidden"
                >
                    <div class="mx-auto flex justify-center h-max gap-1">
                        <button
                            @click="openMenu()"
                            class="font-base text-gray-800 text-2xl font-semibold"
                        >
                            <div class="fas fa-bars"></div>
                        </button>
                    </div>
                </div>
            </div>

            <div class="col-span-10">
                <div
                    class="py-8 overflow-hidden h-10 flex flex-col justify-center"
                >
                    <div
                        class="flex justify-between hape:justify-end text-gray-600 mx-3"
                    >
                        <div class="flex gap-4 my-auto hape:hidden">
                            <div>
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div><i class="fas fa-bell"></i></div>
                        </div>
                        <div class="flex gap-2 text-black font-semibold">
                            <div
                                v-if="$page.props.users.profile == ''"
                                class="h-10 w-10 rounded-full bg-gray-700 text-center flex flex-col justify-center"
                            >
                                <i class="fas fa-user text-gray-50"></i>
                            </div>
                            <div
                                v-else
                                class="h-10 w-10 rounded-full text-center flex flex-col justify-center drop-shadow-md"
                            >
                                <img
                                    :src="
                                        '/storage/img/profile/' +
                                        $page.props.users.profile
                                    "
                                    alt=""
                                />
                            </div>

                            <button @click="modalShow()">
                                <span class="my-auto"
                                    >{{ $page.props.users.name }}

                                    <i
                                        v-if="showModal"
                                        class="fas fa-arrow-down my-auto"
                                    ></i>
                                    <i
                                        v-else
                                        class="fas fa-arrow-up my-auto"
                                    ></i>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="grid grid-flow-col grid-cols-12">
                <div
                    class="col-span-2 border-r h-screen border-gray-300 hape:hidden"
                >
                    <div class="overflow-hidden flex flex-col justify-center">
                        <!-- Navigasi -->
                        <navigasi></navigasi>
                        <!-- End Navigasi -->
                    </div>
                </div>
                <div class="col-span-10 h-screen hape:col-span-12">
                    <div class="p-8 bg-bg-primary h-full">
                        <slot> </slot>
                    </div>
                </div>
            </div>
        </div>

        <div
            v-if="showModal"
            class="absolute w-52 bg-white drop-shadow-md top-20 overflow-hidden right-0 mx-3 rounded-md"
        >
            <div class="p-2 flex flex-col gap-4">
                <span class="text-gray-700 font-semibold text-sm">
                    Settings
                </span>
                <hr />
                <a
                    href="/dashboard/profile"
                    class="h-9 rounded-md bg-white hover:bg-slate-100 drop-shadow-sm flex flex-col justify-center font-semibold text-gray-700"
                >
                    <div class="mx-3">
                        <div class="flex gap-2">
                            <i class="fas fa-cogs my-auto"></i>
                            <span>Profile</span>
                        </div>
                    </div>
                </a>
                <button
                    @click="logout()"
                    class="h-9 rounded-md bg-white hover:bg-slate-100 drop-shadow-sm flex flex-col justify-center font-semibold text-gray-700"
                >
                    <div class="mx-3">
                        <div class="flex gap-2">
                            <i class="fas fa-power-off my-auto"></i>
                            <span>Logout</span>
                        </div>
                    </div>
                </button>
            </div>
        </div>
        <div
            v-if="openMenuBar"
            class="absolute bg-white drop-shadow-md top-16 mt-1 overflow-hidden left-0 rounded-md"
        >
            <div class="w-full">
                <navigasi @close-menu="closeMenuBar"></navigasi>
            </div>
        </div>
    </div>
</template>

<script>
import Navigasi from "../Widgets/Navigasi.vue";
import { router } from "@inertiajs/vue3";

export default {
    components: {
        Navigasi,
    },
    data() {
        return {
            showModal: false,
            openMenuBar: false,
        };
    },
    props: {
        chart: Object,
    },
    methods: {
        modalShow() {
            this.showModal = !this.showModal;
        },
        logout() {
            router.post("/logout", {
                preserveScroll: true,
            });
        },
        openMenu() {
            this.openMenuBar = !this.openMenuBar;
        },
        closeMenuBar() {
            this.openMenuBar = false;
        },
    },
    mounted() {},
};
</script>

<style></style>
