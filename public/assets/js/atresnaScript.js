// Slider Function
let slideElement = document.getElementById("slider");

let currentSlide = 1;
if (currentSlide >= 2) {
    let totalSlide = slideElement.childElementCount;
}

function next() {
    if (currentSlide < totalSlide) {
        currentSlide++;
        showSlide();
    } else {
        currentSlide = 1;
        showSlide();
    }
}

function prev() {
    if (currentSlide <= 1) {
        currentSlide = totalSlide;
        showSlide();
    } else {
        currentSlide--;
        showSlide();
    }
}

function showSlide() {
    slides = document.getElementById("slider").getElementsByTagName("li");
    for (let index = 0; index < totalSlide; index++) {
        const element = slides[index];
        if (currentSlide === index + 1) {
            element.classList.remove("hidden");
            element.classList.add("show");
        } else {
            element.classList.add("hidden");
        }
    }
}

// End Slider Function
function changeImage(value, id) {
    var image = (document.getElementById("produkMainImage").src = value);
    var panel = document.getElementById("imagePanel" + id);

    if (image == value) {
        document
            .getElementById("imagePanel" + id)
            .classList.add("border-2", "border-primary-color-mtma");
    }
}

// Open Modal
function openModalBar() {
    document.getElementById("modalMenubar").classList.add(["hape:flex"]);
}

// clsoed modal
function closedModal() {
    document.getElementById("modalMenubar").classList.remove("hape:flex");
}

const slidesContainer = document.getElementById("slides-container");
const slide = document.querySelector(".slide");
const prevButton = document.getElementById("slide-arrow-prev");
const nextButton = document.getElementById("slide-arrow-next");
nextButton.addEventListener("click", () => {
    const slideWidth = slide.clientWidth;
    let totalSlide = slidesContainer.childElementCount;
    let totalSize = slideWidth * totalSlide;
    console.log(totalSize - slideWidth);
    // slidesContainer.scrollLeft = ;
    if (slidesContainer.scrollLeft == totalSize - slideWidth) {
        slidesContainer.scrollLeft = 0;
    } else {
        slidesContainer.scrollLeft += slideWidth;
    }
});
prevButton.addEventListener("click", () => {
    const slideWidth = slide.clientWidth;
    slidesContainer.scrollLeft -= slideWidth;
});

// function open
function openChildNav() {
    var showData = document
        .getElementById("childNav")
        .classList.contains("hidden");
    if (showData) {
        document.getElementById("childNav").classList.remove("hidden");
    } else {
        document.getElementById("childNav").classList.add("hidden");
    }
    console.log(showData);
}
