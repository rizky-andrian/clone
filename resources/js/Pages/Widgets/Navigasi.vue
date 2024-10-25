<template>
    <div class="p-5 flex flex-col gap-6">
        <div class="flex flex-col gap-4">
            <div class="text-xs text-gray-600 hape:flex hape:justify-between">
                <h1>HOMES</h1>
                <button
                    @click="$emit('closeMenu')"
                    class="hidden hape:inline font-semibold text-red-600"
                >
                    Closed
                </button>
            </div>
            <Link
                href="/dashboard"
                class="text-bold rounded-md text-gray-700 hover:text-primary-color"
            >
                <div
                    class="flex gap-2 px-3 py-2"
                    :class="{
                        'hover: text-white hover: text-bold bg-blue-400 rounded-md':
                            $page.url === '/dashboard',
                    }"
                >
                    <i class="fas fa-columns my-auto"></i>
                    <span>Analytics Dashboard</span>
                </div>
            </Link>
        </div>

        <div class="flex flex-col gap-4">
            <div class="text-xs text-gray-600">
                <h1>MAIN MENU</h1>
            </div>
            <Link
                href="/dashboard/master"
                class="text-bold rounded-md text-gray-700 hover:text-primary-color"
            >
                <div
                    class="flex gap-2 px-3 py-2"
                    :class="{
                        'hover: text-white hover: text-bold bg-blue-400 rounded-md':
                            $page.url === '/dashboard/master' ||
                            $page.url.startsWith('/dashboard/master'),
                    }"
                >
                    <i class="fas fa-server my-auto"></i>
                    <span>Master Data</span>
                </div>
            </Link>
            <Link
                href="/dashboard/pages"
                class="text-bold rounded-md text-gray-700 hover:text-primary-color"
            >
                <div
                    class="flex gap-2 px-3 py-2"
                    :class="{
                        'hover: text-white hover: text-bold bg-blue-400 rounded-md':
                            $page.url === '/dashboard/pages' ||
                            $page.url.startsWith('/dashboard/pages'),
                    }"
                >
                    <i class="fas fa-file-alt my-auto"></i>
                    <span>Static Pages</span>
                </div>
            </Link>
            <Link
                href="/dashboard/blog-news"
                class="text-bold rounded-md text-gray-700 hover:text-primary-color"
            >
                <div
                    class="flex gap-2 px-3 py-2"
                    :class="{
                        'hover: text-white hover: text-bold bg-blue-400 rounded-md':
                            $page.url === '/dashboard/blog-news' ||
                            $page.url.startsWith('/dashboard/blog-news'),
                    }"
                >
                    <i class="fas fa-newspaper my-auto"></i>
                    <span>Blog And News</span>
                </div>
            </Link>
            <Link
                href="/dashboard/konfigurasi"
                class="text-bold rounded-md text-gray-700 hover:text-primary-color"
            >
                <div
                    class="flex gap-2 px-3 py-2"
                    :class="{
                        'hover: text-white hover: text-bold bg-blue-400 rounded-md':
                            $page.url === '/dashboard/konfigurasi' ||
                            $page.url.startsWith('/dashboard/konfigurasi'),
                    }"
                >
                    <i class="fas fa-cogs my-auto"></i>
                    <span>Konfigurasi</span>
                </div>
            </Link>
        </div>
    </div>
</template>

<script>
import { Link } from "@inertiajs/vue3";
export default {
    components: {
        Link,
    },
};
</script>
<style></style>
