<template>
    <div class="p-3 rounded-xl bg-white flex flex-col gap-4">
        <!-- Title Pages -->
        <title-pages :backto="'/dashboard/master'">
            Master Customer
        </title-pages>
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
        <div class="mx-3 flex flex-col">
            <div
                class="h-12 bg-slate-100 rounded-lg flex flex-col justify-center"
            >
                <div class="mx-2 flex justify-between py-2">
                    <div>
                        <input
                            type="search"
                            name=""
                            placeholder="Search Customer"
                            id=""
                            class="rounded-lg px-2 py-2 focus:outline-none text-sm w-96"
                        />
                    </div>
                    <div class="flex gap-3">
                        <button
                            class="bg-blue-400 my-auto text-xs rounded-lg text-white py-2 px-3 hover:bg-white hover:text-blue-400 hover:drop-shadow-sm"
                            @click="openCreateModal()"
                        >
                            <i class="fas fa-plus"></i>
                            Buat Data Baru
                        </button>
                        <button
                            v-if="multiDeleteButton"
                            class="bg-red-400 my-auto text-xs rounded-lg text-white py-2 px-3 hover:bg-white hover:text-red-400 hover:drop-shadow-sm"
                            @click="deleteMultiple()"
                        >
                            <i class="fas fa-trash"></i>
                            Delete Multiple Data
                        </button>
                    </div>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table
                    class="w-full divide-y-2 divide-gray-200 bg-white text-sm"
                >
                    <thead
                        class="ltr:text-left rtl:text-right text-left overflow-hidden"
                    >
                        <tr>
                            <th
                                class="whitespace-nowrap py-2 font-medium text-gray-900"
                            ></th>
                            <th
                                class="whitespace-nowrap px-4 py-2 font-medium text-gray-900"
                            >
                                Nama Customer
                            </th>
                            <th
                                class="whitespace-nowrap px-4 py-2 font-medium text-gray-900"
                            >
                                Type
                            </th>

                            <th
                                class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 text-center"
                            >
                                Action
                            </th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-200">
                        <tr v-if="this.customer.data == []"></tr>
                        <tr
                            v-else
                            v-for="itemCustomer in customer.data"
                            class="hover:bg-gray-200"
                        >
                            <td>
                                <input
                                    type="checkbox"
                                    @change="deleteCheck(itemCustomer.id)"
                                />
                            </td>
                            <td
                                class="whitespace-nowrap px-4 py-2 font-medium text-gray-900"
                            >
                                {{ itemCustomer.customer_name }}
                            </td>
                            <td
                                class="whitespace-nowrap px-4 py-2 font-medium text-gray-900"
                            >
                                {{ itemCustomer.type }}
                            </td>


                            <td
                                class="whitespace-nowrap py-2 flex gap-1 justify-center"
                            >
                                <button
                                    @click="showData(itemCustomer.id)"
                                    class="inline-block rounded bg-blue-400 px-4 py-2 text-xs font-medium text-white hover:bg-blue-700"
                                >
                                    View
                                </button>
                                <button
                                    @click="showModal(itemCustomer.id)"
                                    class="inline-block rounded bg-yellow-400 px-4 py-2 text-xs font-medium text-white hover:bg-yellow-700"
                                >
                                    Edit
                                </button>
                                <button
                                    @click="showModalDelete(itemCustomer.id)"
                                    class="inline-block rounded bg-red-400 px-4 py-2 text-xs font-medium text-white hover:bg-red-700"
                                >
                                    Delete
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div
                    v-if="modalCreate"
                    class="absolute backdrop-blur-sm top-12 h-screen w-full left-0 flex flex-col justify-center"
                >
                    <div
                        class="mx-auto w-2/4 bg-white drop-shadow-lg rounded-lg"
                    >
                        <div class="p-5">
                            <div class="flex justify-between h-6">
                                <div
                                    v-if="updateMode"
                                    class="text-gray-600 font-semibold text-lg"
                                >
                                    Update Data Customer
                                </div>
                                <div
                                    v-else
                                    class="text-gray-600 font-semibold text-lg"
                                >
                                    Buat Data Customer
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
                            <!-- Nama Customer -->
                            <div class="flex flex-col gap-2">
                                <label class="text-gray-700"
                                    >Nama Customer</label
                                >
                                <input
                                    class="drop-shadow-sm border py-2 px-3 rounded-md focus:outline-none text-sm"
                                    type="text"
                                    placeholder="Nama Customer"
                                    v-model="form.customer_name"
                                />
                                <div
                                    class="text-xs px-1 text-red-600"
                                    v-if="errors.customer_name"
                                >
                                    {{ errors.customer_name }}
                                </div>
                            </div>

                            <!-- Link URL -->
                            <div class="flex flex-col gap-2">
                                <label class="text-gray-700">Link URL</label>
                                <input
                                    class="drop-shadow-sm border py-2 px-3 rounded-md focus:outline-none text-sm"
                                    type="text"
                                    placeholder="URL / WEB Customer"
                                    v-model="form.customer_link"
                                />
                                <div
                                    class="text-xs px-1 text-red-600"
                                    v-if="errors.customer_link"
                                >
                                    {{ errors.customer_link }}
                                </div>
                            </div>

                            <!-- Uraian Pekerjaan -->
                            <div class="flex flex-col gap-2">
                                <label class="text-gray-700"
                                    >Uraian Pekerjaan</label
                                >
                                <textarea
                                    class="drop-shadow-sm border py-2 px-3 rounded-md focus:outline-none text-sm"
                                    cols="10"
                                    rows="3"
                                    v-model="form.customer_job_desc"
                                    placeholder="Uraian Pekerjaan / Project"
                                ></textarea>
                                <div
                                    class="text-xs px-1 text-red-600"
                                    v-if="errors.customer_job_desc"
                                >
                                    {{ errors.customer_job_desc }}
                                </div>
                            </div>

                            <div class="flex flex-col gap-2">
                                <label class="text-gray-700">Type</label>
                                <select
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    v-model="form.customer_type"
                                    placeholder="Uraian Pekerjaan / Project"
                                >
                                    <option value="Pharmaceutical">
                                        Pharmaceutical
                                    </option>
                                    <option value="Personal care">
                                        Personal care
                                    </option>
                                    <option value="food&beverage">
                                        food&beverage
                                    </option>
                                    <option value="General Industry">
                                        General Industry
                                    </option>
                                </select>
                                <div
                                    class="text-xs px-1 text-red-600"
                                    v-if="errors.customer_job_desc"
                                >
                                    {{ errors.customer_job_desc }}
                                </div>
                            </div>

                            <!-- Alamat -->
                            <div class="flex flex-col gap-2">
                                <label class="text-gray-700">Alamat</label>
                                <textarea
                                    class="drop-shadow-sm border py-2 px-3 rounded-md focus:outline-none text-sm"
                                    cols="30"
                                    rows="4"
                                    v-model="form.customer_address"
                                    placeholder="Alamat Customer"
                                ></textarea>
                                <div
                                    class="text-xs px-1 text-red-600"
                                    v-if="errors.customer_address"
                                >
                                    {{ errors.customer_address }}
                                </div>
                            </div>

                            <!-- Image Preview -->
                            <div v-if="updateMode" class="flex justify-center">
                                <div
                                    v-if="imageBaru"
                                    class="flex justify-between gap-2"
                                >
                                    <img
                                        class="rounded-md max-w-sm mx-auto max-h-60"
                                        :src="imagesShow(imageBaru)"
                                        alt=""
                                    />
                                </div>
                                <div v-else>
                                    <img
                                        class="rounded-md max-w-sm mx-auto max-h-60"
                                        :src="
                                            '/storage/img/customer/' +
                                            imageCustomer
                                        "
                                        alt=""
                                    />
                                </div>
                            </div>

                            <!-- Type Select -->

                            <!-- Logo Customer -->
                            <div class="flex flex-col gap-2">
                                <label class="text-gray-700"
                                    >Logo Customer</label
                                >
                                <input
                                    class="text-sm"
                                    type="file"
                                    @input="
                                        form.customer_logo =
                                            $event.target.files[0];
                                        uploadFoto();
                                    "
                                />
                                <div
                                    class="text-xs px-1 text-red-600"
                                    v-if="errors.customer_logo"
                                >
                                    {{ errors.customer_logo }}
                                </div>
                            </div>

                            <!-- Submit Buttons -->
                            <button
                                v-if="updateMode"
                                class="bg-yellow-400 hover:bg-yellow-700 text-white py-1 rounded-md drop-shadow-sm"
                                type="submit"
                            >
                                Update
                            </button>
                            <button
                                v-else
                                class="bg-blue-400 hover:bg-blue-700 text-white py-1 rounded-md drop-shadow-sm"
                                type="submit"
                            >
                                Buat Data Baru
                            </button>
                        </form>
                    </div>
                </div>

                <div
                    v-if="modalShow"
                    class="absolute backdrop-blur-sm top-0 h-screen w-full overflow-hidden left-0 flex flex-col justify-center"
                >
                    <div
                        class="mx-auto w-3/6 bg-white drop-shadow-lg rounded-lg"
                    >
                        <div class="p-5">
                            <div class="flex justify-between h-6">
                                <div
                                    class="text-gray-600 font-semibold text-lg"
                                >
                                    {{ singelData[0].customer_name }}
                                </div>
                                <button
                                    class="bg-red-400 text-white rounded-md p-4 flex flex-col justify-center hover:bg-red-700"
                                    @click="this.modalShow = !this.modalShow"
                                >
                                    <span class="">Tutup</span>
                                </button>
                            </div>
                        </div>
                        <hr />
                        <div class="p-5 flex flex-col w-full gap-5">
                            <div
                                class="flex justify-center gap-2 overflow-x-auto"
                            >
                                <img
                                    class="rounded-md max-h-40"
                                    :src="
                                        '/storage/img/customer/' +
                                        singelData[0].customer_logo
                                    "
                                    alt=""
                                />
                            </div>
                            <table>
                                <tbody class="text-gray-700">
                                    <tr
                                        class="border hover:border border-gray-400 hover:bg-gray-200 h-8"
                                    >
                                        <td
                                            class="border hover:border border-gray-400 w-1/3"
                                        >
                                            <span
                                                class="px-2 py-1 text-sm font-semibold"
                                                >Nama Customer</span
                                            >
                                        </td>

                                        <td
                                            class="border hover:border border-gray-400 w-2/3"
                                        >
                                            <span class="px-2 py-1">{{
                                                singelData[0].customer_name
                                            }}</span>
                                        </td>
                                    </tr>
                                    <tr
                                        class="border hover:border border-gray-400 hover:bg-gray-200 h-8"
                                    >
                                        <td
                                            class="border hover:border border-gray-400 w-1/3"
                                        >
                                            <span
                                                class="px-2 py-1 text-sm font-semibold"
                                                >URL Customer</span
                                            >
                                        </td>
                                        <td
                                            class="border hover:border border-gray-400 w-2/3"
                                        >
                                            <a
                                                :href="
                                                    singelData[0].customer_link
                                                "
                                                target="_blank"
                                                class="px-2 py-1 hover:text-blue-900 hover:italic"
                                                >{{
                                                    singelData[0].customer_link
                                                }}</a
                                            >
                                        </td>
                                    </tr>
                                    <tr
                                        class="border hover:border border-gray-400 hover:bg-gray-200 h-8"
                                    >
                                        <td
                                            class="border hover:border border-gray-400 w-1/3"
                                        >
                                            <span
                                                class="px-2 py-1 text-sm font-semibold"
                                                >Uraian Pekerjaan</span
                                            >
                                        </td>
                                        <td
                                            class="border hover:border border-gray-400 w-2/3"
                                        >
                                            <span class="px-2 py-1">
                                                {{
                                                    singelData[0]
                                                        .customer_job_desc
                                                }}
                                            </span>
                                        </td>
                                    </tr>
                                    <tr
                                        class="border hover:border border-gray-400 hover:bg-gray-200 h-8"
                                    >
                                        <td
                                            class="border hover:border border-gray-400 w-1/3"
                                        >
                                            <span
                                                class="px-2 py-1 text-sm font-semibold"
                                                >Alamat Customer</span
                                            >
                                        </td>
                                        <td
                                            class="border hover:border border-gray-400 w-2/3"
                                        >
                                            <span class="px-2 py-1">
                                                {{
                                                    singelData[0]
                                                        .customer_address
                                                }}
                                            </span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div
                    v-if="modalSingleDelete"
                    class="absolute backdrop-blur-sm top-0 h-screen w-full overflow-hidden left-0 flex flex-col justify-center"
                >
                    <div
                        class="mx-auto w-2/6 bg-white drop-shadow-lg rounded-lg"
                    >
                        <div class="p-5">
                            <div class="flex justify-between h-6">
                                <div
                                    class="text-gray-600 font-semibold text-lg"
                                >
                                    Konfirmasi Hapus Data !
                                </div>
                            </div>
                        </div>
                        <hr />
                        <div class="p-5 flex flex-col w-full gap-5">
                            <div class="flex flex-col gap-2">
                                <h1>Yakin ingin menghapus Data ini ?</h1>
                                <span
                                    class="font-semibold text-gray-900 text-center"
                                    >{{ singelData[0].customer_name }}</span
                                >
                            </div>
                            <div class="flex justify-between gap-2">
                                <button
                                    class="bg-blue-400 flex-1 py-1 text-white rounded-md hover:bg-blue-700"
                                    @click="actionDeleteSingleData()"
                                >
                                    <span class="mx-auto py-4">Iya !</span>
                                </button>
                                <button
                                    class="bg-red-400 text-white rounded-md hover:bg-red-700 flex-1 py-1"
                                    @click="closedModal()"
                                >
                                    <span class="mx-auto py-4">Batal</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex justify-left gap-3 py-3">
                <div v-for="link in customer.links">
                    <a v-if="link.url !== null" :href="link.url">
                        <div
                            :class="
                                link.active
                                    ? 'bg-blue-500 hover:bg-blue-700 border-none'
                                    : ''
                            "
                            class="px-4 py-1 rounded-md text-xs hover:bg-blue-700 bg-blue-400 text-white font-semibold"
                            v-html="link.label"
                        ></div>
                    </a>
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
import CardMasterData from "../../../Widgets/CardMasterData.vue";
import { Link } from "@inertiajs/vue3";
import { router, useForm } from "@inertiajs/vue3";
import Editor from "@tinymce/tinymce-vue";

export default {
    data() {
        return {
            modalCreate: false,
            singelData: [],
            updateModal: false,
            modalShow: false,
            multiDeleteButton: false,
            updateMode: false,
            imageBaru: null,
            modalSingleDelete: false,
            deskripsi: "",
            imageCustomer: "",
        };
    },
    setup() {
        const form = useForm({
            customer_name: "",
            customer_address: "",
            customer_link: "",
            customer_job_desc: "",
            customer_logo: "",
        });

        const deleteForm = useForm({
            idCustomer: [],
        });

        return { form, deleteForm };
    },
    components: {
        Navigasi,
        DashboardLayout,
        TitlePages,
        CardMasterData,
        Link,
        Editor,
    },
    props: {
        chart: Object,
        customer: Object,
        errors: Object,
        links: Array,
    },
    layout: DashboardLayout,
    methods: {
        openCreateModal() {
            this.modalCreate = true;
        },
        uploadFoto() {
            this.imageBaru = this.form.customer_logo;
        },
        imagesShow(img) {
            return URL.createObjectURL(img);
        },
        submitForm() {
            if (!this.updateMode) {
                router.post(
                    "/dashboard/master/customer/create-customer",
                    this.form,
                    {
                        preserveScroll: true,
                        onSuccess: () => {
                            this.form.reset();
                            this.modalCreate = false;
                            this.imageBaru = null;
                            this.closedModal();
                        },
                    }
                );
            } else {
                router.post(
                    "/dashboard/master/customer/update-customer/" +
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
        showData(id) {
            this.modalShow = true;
            this.singelData = this.customer.data.filter(
                (data) => data.id == id
            );
        },
        showModal(id) {
            this.modalCreate = true;
            this.updateMode = true;
            this.singelData = this.customer.data.filter(
                (data) => data.id == id
            );
            this.form.customer_name = this.singelData[0].customer_name;
            this.form.customer_address = this.singelData[0].customer_address;
            this.form.customer_link = this.singelData[0].customer_link;
            this.form.customer_job_desc = this.singelData[0].customer_job_desc;
            this.imageCustomer = this.singelData[0].customer_logo;
            this.form.customer_type = this.singelData[0].customer_type;
        },
        deleteCheck(id) {
            this.multiDeleteButton = true;
            if (this.deleteForm.idCustomer.length < 1) {
                this.multiDeleteButton = false;
                this.deleteForm.idCustomer = [];
            }
            if (this.deleteForm.idCustomer.includes(id)) {
                let data = this.deleteForm.idCustomer.indexOf(id);
                this.deleteForm.idCustomer.splice(data, 1);
            } else {
                this.deleteForm.idCustomer.push(id);
            }
        },
        deleteMultiple() {
            router.post(
                "/dashboard/master/customer/delete-multi-customer",
                this.deleteForm.idCustomer,
                {
                    preserveScroll: true,
                    onSuccess: () => {
                        this.deleteForm.reset();
                        this.multiDeleteButton = false;
                        this.idForm = [];
                        this.deleteForm.idCustomer = [];
                    },
                }
            );
        },
        showModalDelete(id) {
            this.modalSingleDelete = true;
            this.singelData = this.customer.data.filter(
                (data) => data.id == id
            );
            this.form.customer_name = this.singelData[0].customer_name;
        },
        actionDeleteSingleData() {
            router.delete(
                "/dashboard/master/customer/delete-customer/" +
                    this.singelData[0].id,
                {
                    preserveScroll: true,
                    onSuccess: () => {
                        this.closedModal();
                    },
                }
            );
        },
        closedModal() {
            this.modalCreate = false;
            this.modalSingleDelete = false;
            this.updateModal = false;
            this.singelData = [];
            this.updateMode = false;
            this.form.reset();
            this.imageBaru = null;
            this.deleteForm.reset();
            this.images_produk = [];
        },
    },
};
</script>
