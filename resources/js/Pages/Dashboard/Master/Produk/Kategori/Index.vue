<template>
    <div class="p-3 rounded-xl bg-white flex flex-col gap-4">
        <!-- Title Pages -->
        <title-pages :backto="'/dashboard/master/produk'">
            Master Kategori Produk
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
                            placeholder="Search Kategori Produk"
                            id=""
                            class="rounded-lg px-2 py-2 focus:outline-none text-sm"
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
                    <thead class="ltr:text-left rtl:text-right text-left">
                        <tr>
                            <th
                                class="whitespace-nowrap py-2 font-medium text-gray-900"
                            ></th>
                            <th
                                class="whitespace-nowrap px-4 py-2 font-medium text-gray-900"
                            >
                                Nama Kategori
                            </th>

                            <th
                                class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 text-center"
                            >
                                Action
                            </th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-200">
                        <tr v-if="this.produk.data == []"></tr>
                        <tr
                            v-else
                            v-for="itemProduk in produk.data"
                            class="hover:bg-gray-200"
                        >
                            <td>
                                <input
                                    type="checkbox"
                                    @change="deleteCheck(itemProduk.id)"
                                />
                            </td>
                            <td
                                class="whitespace-nowrap px-4 py-2 font-medium text-gray-900"
                            >
                                {{ itemProduk.nama_kategori }}
                            </td>

                            <td
                                class="whitespace-nowrap py-2 flex gap-1 justify-center"
                            >
                                <button
                                    @click="showData(itemProduk.id)"
                                    class="inline-block rounded bg-blue-400 px-4 py-2 text-xs font-medium text-white hover:bg-blue-700"
                                >
                                    View
                                </button>
                                <button
                                    @click="showModal(itemProduk.id)"
                                    class="inline-block rounded bg-yellow-400 px-4 py-2 text-xs font-medium text-white hover:bg-yellow-700"
                                >
                                    Edit
                                </button>
                                <button
                                    @click="showModalDelete(itemProduk.id)"
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
                    class="absolute backdrop-blur-sm top-0 h-screen w-full left-0 flex flex-col justify-center"
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
                                    Update Kategori
                                </div>
                                <div
                                    v-else
                                    class="text-gray-600 font-semibold text-lg"
                                >
                                    Buat Kategori Baru
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
                                <label class="text-gray-700"
                                    >Nama Kategori Produk</label
                                >
                                <input
                                    class="drop-shadow-sm border py-2 px-3 rounded-md focus:outline-none text-sm"
                                    type="text"
                                    name="Nama Kategori Produk"
                                    placeholder="Nama Kategori Produk"
                                    v-model="form.nama_kategori"
                                />
                                <div
                                    class="text-xs px-1 text-red-600"
                                    v-if="errors.nama_kategori"
                                >
                                    {{ errors.nama_kategori }}
                                </div>
                            </div>
                            <div class="flex flex-col gap-2">
                                <label class="text-gray-700"
                                    >Deskripsi Kategori Produk</label
                                >
                                <textarea
                                    class="drop-shadow-sm border py-2 px-3 rounded-md focus:outline-none text-sm"
                                    name=""
                                    id=""
                                    cols="10"
                                    rows="3"
                                    placeholder="Dekskripsi Kategori"
                                    v-model="form.deskripsi_kategori"
                                ></textarea>
                            </div>

                            <div v-if="updateMode" class="flex justify-center">
                                <div
                                    v-if="this.imageBaru != null"
                                    class="flex justify-between gap-2"
                                >
                                    <img
                                        class="rounded-md max-w-sm mx-auto max-h-60"
                                        :src="this.imageBaru"
                                        alt=""
                                    />
                                </div>
                                <div v-else>
                                    <img
                                        class="rounded-md max-w-sm mx-auto max-h-60"
                                        :src="
                                            '/storage/img/kategori-produk/' +
                                            singelData[0].gambar_produk
                                        "
                                        alt=""
                                    />
                                </div>
                            </div>
                            <div v-else>
                                <img
                                    v-if="this.imageBaru != null"
                                    class="rounded-md max-w-sm mx-auto max-h-60"
                                    :src="this.imageBaru"
                                    alt=""
                                />
                            </div>
                            <div class="flex flex-col gap-2">
                                <label class="text-gray-700"
                                    >Gambar Kategori</label
                                >

                                <input
                                    class="text-sm"
                                    type="file"
                                    @input="
                                        form.gambar_produk =
                                            $event.target.files[0];
                                        uploadFoto();
                                    "
                                />
                                <div
                                    class="text-xs px-1 text-red-600"
                                    v-if="errors.gambar_produk"
                                >
                                    {{ errors.gambar_produk }}
                                </div>
                            </div>
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
                        class="mx-auto w-2/6 bg-white drop-shadow-lg rounded-lg"
                    >
                        <div class="p-5">
                            <div class="flex justify-between h-6">
                                <div
                                    class="text-gray-600 font-semibold text-lg"
                                >
                                    {{ singelData[0].nama_kategori }}
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
                            <div class="flex flex-col gap-2">
                                <img
                                    class="rounded-md max-w-sm mx-auto"
                                    :src="
                                        '/storage/img/kategori-produk/' +
                                        singelData[0].gambar_produk
                                    "
                                    alt=""
                                />
                            </div>
                            <div class="flex flex-col gap-2">
                                <label class="text-gray-700"
                                    >Deskripsi Kategori Produk</label
                                >
                                <div
                                    class="drop-shadow-sm border bg-slate-100 text-gray-700 font-semibold py-2 px-3 rounded-md focus:outline-none text-sm"
                                >
                                    {{ singelData[0].deskripsi_kategori }}
                                </div>
                            </div>
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
                                    >{{ singelData[0].nama_kategori }}</span
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
                <div v-for="link in produk.links">
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
import Navigasi from "../../../../Widgets/Navigasi.vue";
import DashboardLayout from "../../../../Layouts/DashboardLayout.vue";
import TitlePages from "../../../../Widgets/TitlePages.vue";
import CardMasterData from "../../../../Widgets/CardMasterData.vue";
import { Link } from "@inertiajs/vue3";
import { router, useForm } from "@inertiajs/vue3";

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
        };
    },
    setup() {
        const form = useForm({
            nama_kategori: null,
            deskripsi_kategori: null,
            gambar_produk: null,
        });

        const deleteForm = useForm({
            idProduk: [],
        });

        return { form, deleteForm };
    },
    components: {
        Navigasi,
        DashboardLayout,
        TitlePages,
        CardMasterData,
        Link,
    },
    props: {
        chart: Object,
        produk: Object,
        errors: Object,
        links: Array,
    },
    layout: DashboardLayout,
    methods: {
        openCreateModal() {
            this.modalCreate = true;
        },
        uploadFoto() {
            this.imageBaru = URL.createObjectURL(this.form.gambar_produk);
        },
        submitForm() {
            if (!this.updateMode) {
                router.post(
                    "/dashboard/master/produk/create-kategori-produk",
                    this.form,
                    {
                        preserveScroll: true,
                        onSuccess: () => {
                            this.form.reset();
                            this.modalCreate = false;
                            this.imageBaru = null;
                        },
                    }
                );
            } else {
                router.post(
                    "/dashboard/master/produk/update-kategori-data/" +
                        this.singelData[0].id,
                    this.form,
                    {
                        preserveScroll: true,
                        onSuccess: () => {
                            this.form.reset();
                            this.updateMode = false;
                            this.imageBaru = null;
                            this.modalCreate = null;
                        },
                    }
                );
            }
        },
        showData(id) {
            this.modalShow = true;
            this.singelData = this.produk.data.filter((data) => data.id == id);
        },
        showModal(id) {
            this.modalCreate = true;
            this.updateMode = true;
            this.singelData = this.produk.data.filter((data) => data.id == id);
            this.form.nama_kategori = this.singelData[0].nama_kategori;
            this.form.deskripsi_kategori =
                this.singelData[0].deskripsi_kategori;
        },
        deleteCheck(id) {
            this.multiDeleteButton = true;
            if (this.deleteForm.idProduk.length < 1) {
                this.multiDeleteButton = false;
                this.deleteForm.idProduk = [];
            }
            if (this.deleteForm.idProduk.includes(id)) {
                let data = this.deleteForm.idProduk.indexOf(id);
                this.deleteForm.idProduk.splice(data, 1);
            } else {
                this.deleteForm.idProduk.push(id);
            }
            // console.log(this.multiDeleteButton);
            // console.log(this.deleteForm.idProduk.length);
        },
        deleteMultiple() {
            router.post(
                "/dashboard/master/produk/delete-kategori-produk",
                this.deleteForm.idProduk,
                {
                    preserveScroll: true,
                    onSuccess: () => {
                        this.deleteForm.reset();
                        this.multiDeleteButton = false;
                        this.idForm = [];
                        this.deleteForm.idProduk = [];
                    },
                }
            );
        },
        showModalDelete(id) {
            this.modalSingleDelete = true;
            this.singelData = this.produk.data.filter((data) => data.id == id);
            this.form.nama_kategori = this.singelData[0].nama_kategori;
        },
        actionDeleteSingleData() {
            // alert(this.singelData[0].id);
            router.delete(
                "/dashboard/master/produk/delete-kategori/" +
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
        },
    },
};
</script>

<style></style>
