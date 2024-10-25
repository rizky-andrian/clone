<template>
    <div class="p-3 rounded-xl bg-white flex flex-col gap-4">
        <!-- Title Pages -->
        <title-pages> Master Pages </title-pages>
        <!-- Endt Title Pages -->

        <!-- Main menu  -->
        <div
            class="grid grid-flow-row grid-cols-4 gap-5 mb-10 hape:flex hape:flex-col"
        >
            <!-- Card Master Data -->
            <card-master-data :linkTujuan="'produk'" :iconData="'fa-boxes'"
                >Master Produk</card-master-data
            >
            <card-master-data :linkTujuan="'servis'" :iconData="'fa-users-cog'"
                >Master Jasa & Sevices</card-master-data
            >
            <card-master-data :linkTujuan="'customer'" :iconData="'fa-users'"
                >Master Customer</card-master-data
            >
            <card-master-data :linkTujuan="'sosmed'" :iconData="'fa-thumbs-up'"
                >Master Sosial Media</card-master-data
            >
            <card-master-data :linkTujuan="'slider'" :iconData="'fa-images'"
                >Master Slider</card-master-data
            >
            <card-master-data
                :linkTujuan="'panel-utama'"
                :iconData="'fa-columns'"
                >Master Panel</card-master-data
            >
            <card-master-data :linkTujuan="'history'" :iconData="'fa-history'"
                >Company History</card-master-data
            >
            <card-master-data
                :linkTujuan="'why-choose-us'"
                :iconData="'fa-question-circle'"
                >Why Choose Us</card-master-data
            >
            <card-master-data
                :linkTujuan="'download-center'"
                :iconData="'fa-download'"
                >Download Center</card-master-data
            >  <card-master-data
                :linkTujuan="'projects'"
                :iconData="'fa-briefcase'"
                >Projects</card-master-data
            >
            <!-- End Card Master Data -->
        </div>
        <!-- End Main Menu -->
    </div>
</template>

<script>
import Navigasi from "../../Widgets/Navigasi.vue";
import DashboardLayout from "../../Layouts/DashboardLayout.vue";
import TitlePages from "../../Widgets/TitlePages.vue";
import CardMasterData from "../../Widgets/CardMasterData.vue";

export default {
    components: {
        Navigasi,
        DashboardLayout,
        TitlePages,
        CardMasterData,
    },
    props: {
        chart: Object,
    },
    layout: DashboardLayout,
};
</script>

<style></style>
