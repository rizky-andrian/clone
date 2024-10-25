<template>
    <div>
        <layouts>
            <div
                class="max-w-screen-lg mx-auto flex flex-col justify-center h-full text-gray-800 overflow-hidden"
            >
                <div
                    class="bg-bg-primary h-3/4 hape:h-fit hape:py-4 rounded-3xl flex flex-col justify-center hape:m-3"
                >
                    <div class="flex hape:flex-col hape:justify-end">
                        <div class="flex-1 hape:h-44 hape:w-full">
                            <img
                                class="object-cover max-h-72 hape:max-h-44 mx-auto"
                                :src="'./assets/img/human-login.png'"
                                alt=""
                            />
                        </div>
                        <div class="flex-1">
                            <div
                                class="flex flex-col justify-center h-full w-full"
                            >
                                <div class="flex justify-center w-full">
                                    <div
                                        class="flex flex-col justify-center h-full gap-5 w-full"
                                    >
                                        <div class="w-full">
                                            <h1
                                                class="text-lg text-gray-700 font-bold text-center w-full leading-5"
                                            >
                                                Login Akun Anda
                                                <br />
                                                <span
                                                    class="text-center text-xs mx-auto font-thin"
                                                    >Untuk Mengakses Halaman
                                                    Dashboard</span
                                                >
                                            </h1>
                                        </div>
                                        <!-- Mesasge -->
                                        <div
                                            v-if="$page.props.flash.message"
                                            class="mx-auto h-10 w-2/3 bg-red-400 rounded-lg flex flex-col justify-center"
                                        >
                                            <div
                                                class="mx-4 flex justify-between py-2"
                                            >
                                                <div
                                                    class="my-auto font-semibold text-white hape:text-xs"
                                                >
                                                    {{
                                                        $page.props.flash
                                                            .message
                                                    }}
                                                </div>
                                                <div class="flex gap-3">
                                                    <button
                                                        class="bg-white my-auto text-xs rounded-lg font-semibold py-2 px-3 text-red-400 hover:drop-shadow-sm"
                                                        @click="
                                                            $page.props.flash.message =
                                                                null
                                                        "
                                                    >
                                                        <i
                                                            class="fas fa-times"
                                                        ></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Message -->
                                        <div class="">
                                            <form
                                                @submit.prevent="submitForm"
                                                class="flex flex-col gap-5 w-2/3 mx-auto"
                                                action=""
                                            >
                                                <div
                                                    class="flex flex-col gap-1"
                                                >
                                                    <input
                                                        class="focus:outline-none py-2 px-3 rounded-xl border border-primary-color"
                                                        type="email"
                                                        name="email"
                                                        placeholder="Email"
                                                        v-model="form.email"
                                                        autofocus
                                                        required
                                                    />
                                                    <div
                                                        class="text-xs px-1 text-red-600"
                                                        v-if="errors.email"
                                                    >
                                                        {{ errors.email }}
                                                    </div>
                                                </div>
                                                <div
                                                    class="flex flex-col gap-1"
                                                >
                                                    <input
                                                        class="focus:outline-none py-2 px-3 rounded-xl border border-primary-color"
                                                        type="password"
                                                        name="passwor"
                                                        placeholder="Password"
                                                        v-model="form.password"
                                                        required
                                                    />
                                                    <div
                                                        class="text-xs px-1 text-red-600"
                                                        v-if="errors.password"
                                                    >
                                                        {{ errors.password }}
                                                    </div>
                                                </div>
                                                <button
                                                    class="bg-primary-color hover:bg-secondary-color rounded-xl mx-5 py-1 px-2 h-10 text-white font-bold"
                                                    type="submit"
                                                >
                                                    Login
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </layouts>
    </div>
</template>

<script setup>
import Layouts from "./Layout/Layouts.vue";
import { reactive } from "vue";
import { router } from "@inertiajs/vue3";
defineProps({
    errors: Object,
});

const form = reactive({
    email: null,
    password: null,
});

function submitForm() {
    router.post("/login", form);
}
</script>

<style></style>
