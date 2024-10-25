<template>
    <div class="p-3 rounded-xl bg-white flex flex-col gap-4">
        <!-- Title Pages -->
        <title-pages :backto="'/dashboard/master'"> Master Produk </title-pages>
        <!-- Endt Title Pages -->
        <!-- Menu Maste -->

        <div class="mx-3 flex flex-col">
            <div class="h-12 rounded-lg flex flex-col justify-center">
                <div class="mx-2 flex justify-between py-2">
                    <div class="flex gap-3">
                        <Link
                            href="/dashboard/master/produk/kategori"
                            class="bg-blue-400 my-auto text-xs rounded-lg text-white py-2 px-3 hover:bg-white hover:text-blue-400 hover:drop-shadow-lg drop-shadow-lg"
                        >
                            <i class="fas fa-plus"></i>
                            Kategori Produk
                        </Link>
                        <Link
                            href="/dashboard/master/produk/brand"
                            class="bg-blue-400 my-auto text-xs rounded-lg text-white py-2 px-3 hover:bg-white hover:text-blue-400 hover:drop-shadow-lg drop-shadow-lg"
                        >
                            <i class="fas fa-plus"></i>
                            Brand Produk
                        </Link>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Menu -->
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
                            placeholder="Search Produk"
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
                                Produk
                            </th>
                            <th
                                class="whitespace-nowrap px-4 py-2 font-medium text-gray-900"
                            >
                                Harga Produk
                            </th>
                            <th
                                class="whitespace-nowrap px-4 py-2 font-medium text-gray-900"
                            >
                                Kategori
                            </th>
                            <th
                                class="whitespace-nowrap px-4 py-2 font-medium text-gray-900"
                            >
                                Brand
                            </th>
                            <th
                                class="whitespace-nowrap px-4 py-2 font-medium text-gray-900"
                            >
                                Stok
                            </th>
                            <th
                                class="whitespace-nowrap px-4 py-2 font-medium text-gray-900"
                            >
                                Kondisi
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
                                {{ itemProduk.nama_produk }}
                            </td>
                            <td
                                class="whitespace-nowrap px-4 py-2 font-medium text-gray-900"
                            >
                                {{ rpCurency(itemProduk.harga_produk, "Rp.") }}
                            </td>
                            <td
                                class="whitespace-nowrap px-4 py-2 font-medium text-gray-900"
                            >
                                {{ itemProduk.kategori_produk.nama_kategori }}
                            </td>
                            <td
                                class="whitespace-nowrap px-4 py-2 font-medium text-gray-900"
                            >
                                {{ itemProduk.brand_produk.nama_brand }}
                            </td>
                            <td
                                class="whitespace-nowrap px-4 py-2 font-medium text-gray-900"
                            >
                                {{
                                    itemProduk.stok_produk +
                                    " " +
                                    itemProduk.satuan_produk
                                }}
                            </td>
                            <td
                                v-if="itemProduk.kondisi_produk === 'NEW'"
                                class="whitespace-nowrap px-4 py-2 font-medium text-white"
                            >
                                <span
                                    class="bg-green-600 p-2 rounded-lg text-sm"
                                    >New</span
                                >
                            </td>
                            <td
                                v-else
                                class="whitespace-nowrap px-4 py-2 font-medium text-white"
                            >
                                <span
                                    class="bg-yellow-600 p-2 rounded-lg text-sm"
                                    >Second</span
                                >
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
                                    Update Produk
                                </div>
                                <div
                                    v-else
                                    class="text-gray-600 font-semibold text-lg"
                                >
                                    Buat Produk Baru
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
                                <label class="text-gray-700">Nama Produk</label>
                                <input
                                    class="drop-shadow-sm border py-2 px-3 rounded-md focus:outline-none text-sm"
                                    type="text"
                                    name=""
                                    placeholder="Nama Produk"
                                    v-model="form.nama_produk"
                                />
                                <div
                                    class="text-xs px-1 text-red-600"
                                    v-if="errors.nama_produk"
                                >
                                    {{ errors.nama_produk }}
                                </div>
                            </div>
                            <div class="flex justify-between gap-2">
                                <div class="flex flex-col gap-2 flex-1">
                                    <label class="text-gray-700"
                                        >Kategori Produk</label
                                    >
                                    <select
                                        class="drop-shadow-sm border py-2 px-3 rounded-md focus:outline-none text-sm"
                                        v-model="form.id_kategori"
                                    >
                                        <option selected disabled value="">
                                            Pilih Kategori Produk
                                        </option>
                                        <option
                                            v-for="katProduk in kategoriProduk.data"
                                            :value="katProduk.id"
                                        >
                                            {{ katProduk.nama_kategori }}
                                        </option>
                                    </select>
                                    <div
                                        class="text-xs px-1 text-red-600"
                                        v-if="errors.id_kategori"
                                    >
                                        {{ errors.id_kategori }}
                                    </div>
                                </div>
                                <div class="flex flex-col gap-2 flex-1">
                                    <label class="text-gray-700"
                                        >Brand Produk</label
                                    >
                                    <select
                                        class="drop-shadow-sm border py-2 px-3 rounded-md focus:outline-none text-sm"
                                        v-model="form.id_brand"
                                    >
                                        <option selected disabled value="">
                                            Pilih Brand Produk
                                        </option>
                                        <option
                                            v-for="brdProduk in brandProduk.data"
                                            :value="brdProduk.id"
                                        >
                                            {{ brdProduk.nama_brand }}
                                        </option>
                                    </select>
                                    <div
                                        class="text-xs px-1 text-red-600"
                                        v-if="errors.id_brand"
                                    >
                                        {{ errors.id_brand }}
                                    </div>
                                </div>
                            </div>
                            <div class="flex justify-between gap-2">
                                <div class="flex flex-col gap-2 flex-1">
                                    <label class="text-gray-700"
                                        >Satuan Produk</label
                                    >
                                    <select
                                        class="drop-shadow-sm border py-2 px-3 rounded-md focus:outline-none text-sm"
                                        v-model="form.satuan_produk"
                                    >
                                        <option selected disabled value="">
                                            Pilih Satuan Produk
                                        </option>
                                        <option value="PCS">Pcs</option>
                                        <option value="BOX">Box</option>
                                        <option value="LOT">Lot</option>
                                        <option value="PACK">Pack</option>
                                        <option value="KG">KG</option>
                                        <option value="LTR">LTR</option>
                                        <option value="PAIL">Pail</option>
                                    </select>
                                    <div
                                        class="text-xs px-1 text-red-600"
                                        v-if="errors.satuan_produk"
                                    >
                                        {{ errors.satuan_produk }}
                                    </div>
                                </div>
                                <div class="flex flex-col gap-2 flex-1">
                                    <label class="text-gray-700"
                                        >Kondisi Produk</label
                                    >
                                    <select
                                        class="drop-shadow-sm border py-2 px-3 rounded-md focus:outline-none text-sm"
                                        v-model="form.kondisi_produk"
                                    >
                                        <option selected disabled value="">
                                            Pilih Kondisi Produk
                                        </option>
                                        <option value="NEW">New / Baru</option>
                                        <option value="SECOND">
                                            Second / Bekas
                                        </option>
                                    </select>
                                    <div
                                        class="text-xs px-1 text-red-600"
                                        v-if="errors.kondisi_produk"
                                    >
                                        {{ errors.kondisi_produk }}
                                    </div>
                                </div>
                                <div class="flex flex-col gap-2 flex-1">
                                    <label class="text-gray-700"
                                        >Stok Produk</label
                                    >
                                    <input
                                        class="drop-shadow-sm border py-2 px-3 rounded-md focus:outline-none text-sm"
                                        type="number"
                                        min="0"
                                        name=""
                                        placeholder="Stok Produk"
                                        v-model="form.stok_produk"
                                    />
                                    <div
                                        class="text-xs px-1 text-red-600"
                                        v-if="errors.stok_produk"
                                    >
                                        {{ errors.stok_produk }}
                                    </div>
                                </div>
                            </div>
                            <div class="flex justify-between gap-2">
                                <div class="flex flex-col gap-2 flex-1">
                                    <label class="text-gray-700"
                                        >Harga Produk</label
                                    >
                                    <input
                                        class="drop-shadow-sm border py-2 px-3 rounded-md focus:outline-none text-sm"
                                        type="text"
                                        name=""
                                        placeholder="Harga Produk"
                                        v-model="harga_produk"
                                        @keyup="inputHarga()"
                                    />
                                    <div
                                        class="text-xs px-1 text-red-600"
                                        v-if="errors.harga_produk"
                                    >
                                        {{ errors.harga_produk }}
                                    </div>
                                </div>
                                <div class="flex flex-col gap-2 flex-1"></div>
                            </div>

                            <div class="flex flex-col gap-2">
                                <label class="text-gray-700"
                                    >Deskripsi Produk</label
                                >
                                <Editor
                                    api-key="gjbf1w1gssuy4vmn0tdcsds2pl6diikuxv1fkqe24jmmt60x"
                                    :init="{
                                        plugins:
                                            'lists link image table code help wordcount',
                                    }"
                                    v-model="form.deskripsi_produk"
                                />
                                <div
                                    class="text-xs px-1 text-red-600"
                                    v-if="errors.deskripsi_produk"
                                >
                                    {{ errors.deskripsi_produk }}
                                </div>
                            </div>

                            <div
                                v-if="updateMode"
                                class="flex justify-start w-full"
                            >
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
                                <div class="w-full flex gap-3" v-else>
                                    <div
                                        class="relative flex"
                                        v-if="
                                            this.singelData[0].images_produk
                                                .length > 0
                                        "
                                        v-for="(img, index) in this
                                            .singelData[0].images_produk"
                                    >
                                        <img
                                            class="max-h-40 rounded-md p-2"
                                            :src="
                                                '/storage/img/produk/' +
                                                img.gambar_produk
                                            "
                                        />
                                        <button
                                            @click.prevent="
                                                deleteImagesServer(img.id)
                                            "
                                            class="bg-red-600 top-0 absolute -right-2 rounded-full text-sm py-1 px-2 text-white"
                                        >
                                            X
                                        </button>
                                    </div>
                                    <div
                                        class="relative flex"
                                        v-else-if="
                                            this.images_produk.length > 0
                                        "
                                        v-for="(img, index) in this
                                            .images_produk"
                                    >
                                        <img
                                            class="max-h-40 rounded-md p-2"
                                            :src="imagesShow(img)"
                                        />
                                        <button
                                            @click.prevent="deleteImages(index)"
                                            class="bg-red-600 top-0 absolute -right-2 rounded-full text-sm py-1 px-2 text-white"
                                        >
                                            X
                                        </button>
                                    </div>
                                    <div
                                        class="flex mx-auto flex-col justify-center"
                                        v-else
                                    >
                                        <div
                                            class="mx-auto text-xl text-gray-500"
                                        >
                                            Gambar Belum Di Upload
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div
                                v-else
                                class="flex h-40 bg-slate-50 rounded-md border justify-start gap-2 overflow-x-auto overflow-y-hidden"
                            >
                                <div
                                    class="relative flex"
                                    v-if="this.images_produk.length > 0"
                                    v-for="(img, index) in this.images_produk"
                                >
                                    <img
                                        class="max-h-40 rounded-md p-2"
                                        :src="imagesShow(img)"
                                    />
                                    <button
                                        @click.prevent="deleteImages(index)"
                                        class="bg-red-600 top-0 absolute -right-2 rounded-full text-sm py-1 px-2 text-white"
                                    >
                                        X
                                    </button>
                                </div>
                                <div
                                    class="flex mx-auto flex-col justify-center"
                                    v-else
                                >
                                    <div class="mx-auto text-xl text-gray-500">
                                        Gambar Belum Di Upload
                                    </div>
                                </div>
                            </div>

                            <div class="flex flex-col gap-2">
                                <label class="text-gray-700"
                                    >Gambar Produk</label
                                >

                                <input
                                    class="text-sm"
                                    type="file"
                                    multiple
                                    @input="
                                        this.images_upload =
                                            $event.target.files[0];
                                        uploadFoto();
                                    "
                                />
                                <div
                                    class="text-xs px-1 text-red-600"
                                    v-if="errors.gambar_brand"
                                >
                                    {{ errors.gambar_brand }}
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
                        class="mx-auto w-3/6 bg-white drop-shadow-lg rounded-lg"
                    >
                        <div class="p-5">
                            <div class="flex justify-between h-6">
                                <div
                                    class="text-gray-600 font-semibold text-lg"
                                >
                                    Show Produk
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
                                    class="max-h-32"
                                    v-for="gambar in singelData[0]
                                        .images_produk"
                                    :src="
                                        '/storage/img/produk/' +
                                        gambar.gambar_produk
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
                                                >Produk Title</span
                                            >
                                        </td>
                                        <td
                                            class="border hover:border border-gray-400 w-2/3"
                                        >
                                            <span class="px-2 py-1">{{
                                                singelData[0].nama_produk
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
                                                >Harga</span
                                            >
                                        </td>
                                        <td
                                            class="border hover:border border-gray-400 w-2/3"
                                        >
                                            <span class="px-2 py-1">{{
                                                rpCurency(
                                                    singelData[0].harga_produk,
                                                    "Rp. "
                                                )
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
                                                >Satuan</span
                                            >
                                        </td>
                                        <td
                                            class="border hover:border border-gray-400 w-2/3"
                                        >
                                            <span class="px-2 py-1">{{
                                                singelData[0].satuan_produk
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
                                                >Stok</span
                                            >
                                        </td>
                                        <td
                                            class="border hover:border border-gray-400 w-2/3"
                                        >
                                            <span class="px-2 py-1">{{
                                                singelData[0].stok_produk
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
                                                >Produk Kategori</span
                                            >
                                        </td>
                                        <td
                                            class="border hover:border border-gray-400 w-2/3"
                                        >
                                            <span class="px-2 py-1">{{
                                                singelData[0].kategori_produk
                                                    .nama_kategori
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
                                                >Produk Brand</span
                                            >
                                        </td>
                                        <td
                                            class="border hover:border border-gray-400 w-2/3"
                                        >
                                            <span class="px-2 py-1">{{
                                                singelData[0].brand_produk
                                                    .nama_brand
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
                                                >Deskripsi Produk</span
                                            >
                                        </td>
                                        <td
                                            class="border hover:border border-gray-400 w-2/3"
                                        >
                                            <span class="px-2 py-1">{{
                                                singelData[0].deskripsi_produk
                                            }}</span>
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
                                    >{{ singelData[0].nama_produk }}</span
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
            harga_produk: 0,
            images_produk: [],
            images_upload: null,
        };
    },
    setup() {
        const form = useForm({
            nama_produk: null,
            id_kategori: "",
            id_brand: "",
            satuan_produk: "",
            kondisi_produk: "",
            harga_produk: "",
            deskripsi_produk: null,
            gambar_produk: [],
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
        Editor,
    },
    props: {
        chart: Object,
        produk: Object,
        errors: Object,
        links: Array,
        brandProduk: Object,
        kategoriProduk: Object,
    },
    layout: DashboardLayout,
    methods: {
        openCreateModal() {
            this.modalCreate = true;
        },
        uploadFoto() {
            this.images_produk.push(this.images_upload);
            this.form.gambar_produk = this.images_produk;
        },
        deleteImages(index) {
            this.images_produk.splice(index, 1);
        },
        deleteImagesServer(id) {
            router.delete(
                "/dashboard/master/produk/delete-images-produk/" + id,
                {
                    preserveScroll: true,
                    onSuccess: () => {
                        this.closedModal();
                    },
                }
            );
        },
        imagesShow(img) {
            return URL.createObjectURL(img);
        },
        formatRupiah(angka, prefix) {
            let number_string = angka.replace(/[^,\d]/g, "").toString(),
                split = number_string.split(","),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            // tambahkan titik jika yang di input sudah menjadi angka ribuan
            if (ribuan) {
                let separator = sisa ? "." : "";
                rupiah += separator + ribuan.join(".");
            }

            rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
            return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
        },
        rpCurency(value, prefix) {
            let data = 0;
            data = value.toString();
            let desimal = data.split(",");
            let sisa = desimal[0].length % 3;
            let rupiah = desimal[0].substr(0, sisa);
            let ribuan = desimal[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                let separator = sisa ? "." : "";
                rupiah += separator + ribuan.join(".");
            }

            rupiah =
                desimal[1] != undefined ? rupiah + "," + desimal[1] : rupiah;
            return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
        },
        inputHarga() {
            this.harga_produk = this.formatRupiah(this.harga_produk, "Rp. ");
            let numberSebenernya = this.harga_produk
                .replace(/[^,\d]/g, "")
                .toString();
            // console.log(numberSebenernya);
            this.form.harga_produk = numberSebenernya;
        },
        submitForm() {
            if (!this.updateMode) {
                router.post(
                    "/dashboard/master/produk/create-produk",
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
                    "/dashboard/master/produk/update-produk/" +
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
            this.singelData = this.produk.data.filter((data) => data.id == id);
        },
        showModal(id) {
            this.modalCreate = true;
            this.updateMode = true;
            this.singelData = this.produk.data.filter((data) => data.id == id);
            this.form.nama_produk = this.singelData[0].nama_produk;
            this.form.deskripsi_produk = this.singelData[0].deskripsi_produk;
            this.form.id_kategori = this.singelData[0].id_kategori;
            this.form.id_brand = this.singelData[0].id_brand;
            this.form.satuan_produk = this.singelData[0].satuan_produk;
            this.form.stok_produk = this.singelData[0].stok_produk;
            this.form.kondisi_produk = this.singelData[0].kondisi_produk;
            this.form.harga_produk = this.singelData[0].harga_produk;
            this.harga_produk = this.rpCurency(
                this.singelData[0].harga_produk,
                "Rp. "
            );
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
        },
        deleteMultiple() {
            router.post(
                "/dashboard/master/produk/delete-multi-produk",
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
            this.form.nama_produk = this.singelData[0].nama_produk;
        },
        actionDeleteSingleData() {
            // alert(this.singelData[0].id);
            router.delete(
                "/dashboard/master/produk/delete-produk/" +
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
            this.harga_produk = "";
            this.gambar_produk = [];
            this.images_produk = [];
        },
    },
};
</script>
