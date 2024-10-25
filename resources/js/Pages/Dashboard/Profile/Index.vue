<template>
    <div class="p-3 rounded-xl bg-white flex flex-col gap-4">
        <!-- Title Pages -->
        <title-pages :backto="'/dashboard'"> Pengaturan Profile </title-pages>
        <!-- Endt Title Pages -->

        <!-- Mesasge -->
        <div
            v-if="$page.props.flash.message"
            class="mx-3 h-12 bg-green-400 rounded-lg flex flex-col justify-center"
        >
            <div class="mx-4 flex justify-between py-2">
                <div class="my-auto font-semibold text-white">
                    {{ $page.props.flash.message }}
                </div>
                <div class="flex gap-3">
                    <button
                        class="bg-white my-auto text-xs rounded-lg font-semibold py-2 px-3 text-green-400 hover:drop-shadow-sm"
                        @click="$page.props.flash.message = null"
                    >
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
        </div>
        <!-- End Message -->
        <!-- Main menu  -->
        <div
            class="mx-3 grid grid-flow-col grid-cols-7 hape:flex hape:flex-col"
        >
            <div class="col-span-2 p-5 overflow-hidden">
                <div class="flex flex-col justify-start gap-2">
                    <div
                        v-if="this.imageBaru != null"
                        class="flex justify-between gap-2"
                    >
                        <img
                            class="rounded-md mx-auto max-h-52"
                            :src="imagesShow(this.imageBaru)"
                            alt=""
                        />
                    </div>
                    <div v-if="this.data.profile == ''" class="mx-auto">
                        <img
                            class="rounded-md max-w-sm mx-auto max-h-52"
                            :src="'/assets/img/logo.png'"
                        />
                    </div>
                    <div v-else>
                        <img
                            class="rounded-md max-w-sm mx-auto max-h-52"
                            :src="'/storage/img/profile/' + this.data.profile"
                            alt=""
                        />
                    </div>
                </div>
            </div>
            <div class="overflow-x-auto col-span-5">
                <form
                    @submit.prevent="submitForm"
                    class="p-5 flex flex-col w-full gap-5"
                >
                    <div class="flex flex-col gap-2">
                        <label class="text-gray-700 font-semibold">Name</label>
                        <input
                            class="drop-shadow-sm border py-2 px-3 rounded-md focus:outline-none text-sm"
                            type="text"
                            name=""
                            placeholder="Name"
                            v-model="form.name"
                        />
                        <div
                            class="text-xs px-1 text-red-600"
                            v-if="errors.name"
                        >
                            {{ errors.name }}
                        </div>
                    </div>
                    <div class="flex flex-col gap-2">
                        <label class="text-gray-700 font-semibold">Email</label>

                        <input
                            class="drop-shadow-sm border py-2 px-3 rounded-md focus:outline-none text-sm"
                            type="email"
                            name=""
                            placeholder="Company Email"
                            v-model="form.email"
                        />
                        <div
                            class="text-xs px-1 text-red-600"
                            v-if="errors.email"
                        >
                            {{ errors.email }}
                        </div>
                    </div>
                    <div class="flex flex-col gap-2">
                        <label class="text-gray-700 font-semibold"
                            >Ganti Password</label
                        >

                        <input
                            class="drop-shadow-sm border py-2 px-3 rounded-md focus:outline-none text-sm"
                            type="password"
                            name=""
                            placeholder="Ganti Password"
                            v-model="form.sandi"
                        />
                        <div
                            class="text-xs px-1 text-red-600"
                            v-if="errors.sandi"
                        >
                            {{ errors.sandi }}
                        </div>
                    </div>

                    <div class="flex flex-col gap-2">
                        <label class="text-gray-700 font-semibold"
                            >Confirm Passsword</label
                        >
                        <input
                            class="drop-shadow-sm border py-2 px-3 rounded-md focus:outline-none text-sm"
                            type="password"
                            name=""
                            placeholder="Confirm Password"
                            v-model="form.sandi_confirmation"
                        />
                        <div
                            class="text-xs px-1 text-red-600"
                            v-if="errors.sandi_confirmation"
                        >
                            {{ errors.sandi_confirmation }}
                        </div>
                    </div>

                    <div class="flex flex-col gap-2">
                        <label class="text-gray-700 font-semibold"
                            >profile</label
                        >
                        <input
                            class="text-sm"
                            type="file"
                            @input="
                                form.profile = $event.target.files[0];
                                uploadFoto();
                            "
                        />
                        <div
                            class="text-xs px-1 text-red-600"
                            v-if="errors.profile"
                        >
                            {{ errors.profile }}
                        </div>
                    </div>

                    <button
                        class="bg-blue-400 hover:bg-blue-700 text-white py-1 rounded-md drop-shadow-sm"
                        type="submit"
                    >
                        Save
                    </button>
                </form>
            </div>
        </div>
        <!-- End Main Menu -->
    </div>
</template>

<script>
import Navigasi from "../../Widgets/Navigasi.vue";
import DashboardLayout from "../../Layouts/DashboardLayout.vue";
import TitlePages from "../../Widgets/TitlePages.vue";
import { Link } from "@inertiajs/vue3";
import { router, useForm } from "@inertiajs/vue3";

export default {
    data() {
        return {
            imageBaru: null,
        };
    },
    setup() {
        const form = useForm({
            name: "",
            sandi: "",
            sandi_confirmation: "",
            email: "",
            profile: "",
        });

        return { form };
    },
    components: {
        Navigasi,
        DashboardLayout,
        TitlePages,
        Link,
    },
    props: {
        data: Object,
        errors: Object,
    },
    layout: DashboardLayout,
    methods: {
        uploadFoto() {
            this.imageBaru = this.form.profile;
        },
        imagesShow(img) {
            return URL.createObjectURL(img);
        },
        loadData() {
            this.form.name = this.data.name;
            this.form.profile = this.data.profile;
            this.form.email = this.data.email;
        },
        submitForm() {
            {
                router.post("/dashboard/user/" + this.data.id, this.form, {
                    preserveScroll: true,
                    onSuccess: () => {
                        this.imageBaru = null;
                    },
                });
            }
        },
    },
    mounted() {
        this.loadData();
    },
};
</script>
