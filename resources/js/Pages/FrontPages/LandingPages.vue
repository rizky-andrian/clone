<template>
    <!-- Navigasi Compnenet -->
    <front-navigasi :companyInfo="companyInfo"></front-navigasi>
    <!-- Emd Navigasi Components -->
    <!-- Slider Sectio -->
    <div class="m-auto w-full">
        <big-slider :slidesData="slides"></big-slider>
    </div>
    <!-- End Slider -->
    <!-- Introduction Section -->
    <section></section>
    <!-- End Introduction Section -->
</template>

<script>
import FrontPageLayout from "../Layouts/FrontPageLayout.vue";
import BigSlider from "../Widgets/BigSlider.vue";
import FrontNavigasi from "../Widgets/FrontNavigasi.vue";
export default {
    data() {
        return {
            slides: [
                "/assets/img/banner.jpg",
                "/assets/img/banner.jpg",
                "/assets/img/banner.jpg",
                "/assets/img/banner.jpg",
            ],
        };
    },
    components: {
        FrontNavigasi,
        BigSlider,
    },
    props: {
        companyInfo: Object,
    },
    layout: FrontPageLayout,
};
</script>

<style></style>
