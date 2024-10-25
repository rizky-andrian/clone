<template>
    <div class="p-3 rounded-xl bg-white flex flex-col gap-4">
        <!-- Title Pages -->
        <title-pages> Why Choose Us </title-pages>
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
        <div class="flex justify-end mb-10">
            <button
                @click="showModalCreate"
                class="bg-blue-500 px-2 py-2 rounded-md text-sm text-gray-50"
            >
                <i class="fas fa-plus"></i> History Company
            </button>
        </div>
        <!-- Main menu  -->
        <div class="grid grid-flow-row grid-cols-4 gap-5 mb-10">
            <!-- Card Staic Pages -->
            <div
                v-for="panel in this.data.data"
                class="h-58 bg-slate-200 rounded-md flex flex-col gap-2 drop-shadow-md overflow-hidden"
            >
                <div class="h-32 overflow-hidden">
                    <img
                        class="object-cover rounded-tr-md rounded-tl-md mx-auto"
                        :src="'/storage/img/panel/' + panel.image"
                        alt=""
                    />
                </div>
                <div class="p-2 flex flex-col gap-2">
                    <button
                        @click="showData(panel.id)"
                        class="text-xs text-white bg-primary-color px-2 rounded-md h-5 text-center hover:bg-secondary-color"
                    >
                        <span class="my-auto">Show</span>
                    </button>
                </div>
            </div>
            <!-- End Card Staic Pages -->
            <div
                v-if="modal"
                class="absolute backdrop-blur-sm top-12 h-screen w-full left-0 flex flex-col justify-center"
            >
                <div class="mx-auto w-2/4 bg-white drop-shadow-lg rounded-lg">
                    <div class="p-5">
                        <div class="flex justify-between h-6">
                            <div
                                v-if="updateMode"
                                class="text-gray-600 font-semibold text-lg"
                            >
                                Update Choose Us
                            </div>
                            <div
                                v-else
                                class="text-gray-600 font-semibold text-lg"
                            >
                                Tambah Choose Us
                            </div>
                            <button
                                class="bg-red-400 text-white rounded-md p-4 flex flex-col justify-center hover:bg-red-700"
                                @click="closedModal()"
                            >
                                <span class="">Tutup</span>
                            </button>
                        </div>
                    </div>
                    <hr />

                    <form
                        @submit.prevent="submitForm"
                        class="p-5 flex flex-col w-full gap-5"
                    >
                        <div class="flex flex-col gap-2">
                            <label class="text-gray-700">Title</label>
                            <input
                                class="drop-shadow-sm border py-2 px-3 rounded-md focus:outline-none text-sm"
                                type="text"
                                name=""
                                placeholder="title"
                                v-model="form.title"
                            />
                            <div
                                class="text-xs px-1 text-red-600"
                                v-if="errors.title"
                            >
                                {{ errors.title }}
                            </div>
                        </div>
                        <div class="flex flex-col gap-2">
                            <label class="text-gray-700">Description</label>
                            <textarea
                                class="drop-shadow-sm border py-2 px-3 rounded-md focus:outline-none text-sm"
                                v-model="form.description"
                                name=""
                                id=""
                                cols="5"
                                rows="3"
                                placeholder="Panel Description"
                            ></textarea>

                            <div
                                class="text-xs px-1 text-red-600"
                                v-if="errors.description"
                            >
                                {{ errors.description }}
                            </div>
                        </div>

                        <div
                            class="flex w-full justify-around gap-3"
                            v-if="updateMode"
                        >
                            <button
                                class="flex-1 bg-yellow-400 hover:bg-yellow-700 text-white py-1 rounded-md drop-shadow-sm"
                                type="submit"
                            >
                                Update
                            </button>
                            <button
                                class="flex-1 bg-red-400 hover:bg-red-700 text-white py-1 rounded-md drop-shadow-sm"
                                type="button"
                                @click="deleteButton(this.singelData[0].id)"
                            >
                                Delete
                            </button>
                        </div>

                        <button
                            v-else
                            class="bg-blue-400 hover:bg-blue-700 text-white py-1 rounded-md drop-shadow-sm"
                            type="submit"
                        >
                            Buat Data
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <!-- End Main Menu -->
    </div>
</template>

<script>
import Navigasi from "../../../Widgets/Navigasi.vue";
import DashboardLayout from "../../../Layouts/DashboardLayout.vue";
import TitlePages from "../../../Widgets/TitlePages.vue";
import CardKonfData from "../../../Widgets/CardKonfData.vue";
import { useForm, router } from "@inertiajs/vue3";
import Editor from "@tinymce/tinymce-vue";

export default {
    components: {
        Navigasi,
        DashboardLayout,
        TitlePages,
        CardKonfData,
        Editor,
    },
    data() {
        return {
            modal: false,
            updateMode: false,
            imageBaru: null,
            singelData: [],
        };
    },
    setup() {
        const form = useForm({
            title: "",
            description: "",
        });

        return { form };
    },
    props: {
        chart: Object,
        errors: Object,
        links: Array,
        data: Object,
    },
    layout: DashboardLayout,
    methods: {
        showModalCreate() {
            this.modal = true;
        },
        uploadFoto() {
            this.imageBaru = this.form.image;
        },
        showData(id) {
            this.modal = true;
            this.updateMode = true;
            this.singelData = this.data.data.filter((data) => data.id == id);
            this.form.description = this.singelData[0].content;
            this.form.title = this.singelData[0].title;
        },
        imagesShow(img) {
            return URL.createObjectURL(img);
        },
        submitForm() {
            if (!this.updateMode) {
                router.post(
                    "/dashboard/master/why-choose-us/create",
                    this.form,
                    {
                        preserveScroll: true,
                        onSuccess: () => {
                            this.closedModal();
                        },
                    }
                );
            } else {
                router.post(
                    "/dashboard/master/why-choose-us/update/" +
                        this.singelData[0].id,
                    this.form,
                    {
                        preserveScroll: true,
                        onSuccess: () => {
                            this.form.reset();
                            this.updateMode = false;
                            this.imageBaru = null;
                            this.modalCreate = null;
                            this.closedModal();
                        },
                    }
                );
            }
        },
        closedModal() {
            this.modal = false;
            this.form.reset();
            this.updateMode = false;
            this.imageBaru = null;
        },
        deleteButton(id) {
            router.delete("/dashboard/master/panel-utama/delete-panel/" + id, {
                preserveScroll: true,
                onSuccess: () => {
                    this.closedModal();
                },
            });
        },
    },
};
</script>

<style></style>
