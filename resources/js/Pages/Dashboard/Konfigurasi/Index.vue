<template>
    <div class="p-3 rounded-xl bg-white flex flex-col gap-4">
        <!-- Title Pages -->
        <title-pages> Konfigurasi Pages </title-pages>
        <!-- Endt Title Pages -->

        <!-- Main menu  -->
        <div class="grid grid-flow-row grid-cols-4 gap-5 mb-10">
            <!-- Card Master Data -->
            <card-konf-data :linkTujuan="'company'" :iconData="'fa-building'"
                >Informasi Company</card-konf-data
            >
            <!-- <card-master-data :linkTujuan="'servis'" :iconData="'fa-users-cog'"
                >Master Jasa & Sevices</card-master-data
            >
            <card-master-data :linkTujuan="'customer'" :iconData="'fa-users'"
                >Master Customer</card-master-data -->

            <!-- End Card Master Data -->
        </div>
        <!-- End Main Menu -->
    </div>
</template>

<script>
import Navigasi from "../../Widgets/Navigasi.vue";
import DashboardLayout from "../../Layouts/DashboardLayout.vue";
import TitlePages from "../../Widgets/TitlePages.vue";
import CardKonfData from "../../Widgets/CardKonfData.vue";

export default {
    components: {
        Navigasi,
        DashboardLayout,
        TitlePages,
        CardKonfData,
    },
    props: {
        chart: Object,
    },
    layout: DashboardLayout,
};
</script>

<style></style>
