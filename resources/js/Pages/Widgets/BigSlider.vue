<template>
    <section class="max-w-screen-lg mx-auto h-hero">
        <div class="relative slider-content">
            <div
                v-for="(slide, index) in slidesData"
                :key="slide"
                :data-index="index"
                class="absolute shadow-lg h-hero w-full"
            >
                <img class="h-full w-full object-cover" :src="slide" alt="" />
                <div
                    class="flex justify-between absolute top-0 w-full h-hero px-3"
                >
                    <button
                        class="h-10 w-10 my-auto rounded-full bg-white flex flex-col justify-center text-center"
                    >
                        <i class="fas mx-auto fa-arrow-left"></i>
                    </button>
                    <button
                        @click="onNext()"
                        class="h-10 w-10 my-auto rounded-full bg-white flex flex-col justify-center text-center"
                    >
                        <i class="fas mx-auto fa-arrow-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </section>
    <!-- <section>
        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Officiis
        expedita error illo, tempore repudiandae iste aut laboriosam laudantium
        tenetur commodi qui necessitatibus omnis facilis cum? Ratione eos ab aut
        aliquid!
    </section> -->
</template>

<script>
export default {
    name: "BigSlider",
    data() {
        return {
            currentIndex: 0,
        };
    },
    props: {
        slidesData: Array,
    },
    methods: {
        animate(element, animation, onAnimated) {
            const plainClassList = Array.prototype.slice.call(
                element.classList
            );
            const animationsToRemove = plainClassList.filter((className) =>
                className.includes("animate__")
            );
            element.classList.remove("hidden", ...animationsToRemove);
            element.classList.add("animate__animated", animation);
        },
        onNext() {
            const element = document.querySelector(
                `[data-index="${this.currentIndex}"]`
            );
            this.animate(element, "animate__fadeInLeft");
            const nextElementIndex = this.currentIndex + 1;

            const nextElement = document.querySelector(
                `[data-index="${nextElementIndex}"]`
            );
            // this.animate(nextElement, "animate__lightSpeedInRight");
            this.currentIndex = nextElementIndex;
        },
    },
    mounted() {
        this.slidesData.forEach((_, index) => {
            if (index !== this.currentIndex) {
                const element = document.querySelector(
                    `[data-index="${index}"]`
                );
                element.classList.add("hidden");
            }
        });
    },
};
</script>

<style></style>
