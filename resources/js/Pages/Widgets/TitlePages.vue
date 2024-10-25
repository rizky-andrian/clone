<template>
    <div
        class="my-2 text-gray-700 font-semibold text-xl flex justify-between mx-4"
    >
        <slot></slot>
        <Link :href="backto" v-if="backto != null">
            <button><i class="fas fa-arrow-left"></i></button>
        </Link>
    </div>
</template>

<script>
import { Link } from "@inertiajs/vue3";
export default {
    name: "TitlePages",
    components: {
        Link,
    },
    props: {
        backto: String,
    },
};
</script>
