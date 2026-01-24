import "./bootstrap";
import gsap from "gsap";
import $ from "jquery";
import Swal from "sweetalert2";
import Swiper from "swiper/bundle";
import "swiper/css/bundle";

function equalizeSlideHeights() {
    const slides = document.querySelectorAll(".swiper-slide");
    let maxHeight = 0;

    slides.forEach((slide) => {
        slide.style.height = "auto";
        maxHeight = Math.max(maxHeight, slide.offsetHeight);
    });

    const adjustedHeight = maxHeight - 30;

    slides.forEach((slide) => {
        slide.style.height = adjustedHeight + "px";
    });
}

window.Swal = Swal;

let resizeTimeout;
window.addEventListener("resize", () => {
    clearTimeout(resizeTimeout);
    resizeTimeout = setTimeout(equalizeSlideHeights, 150);
});

document.addEventListener("DOMContentLoaded", function () {
    new Swiper(".mySwiper", {
        slidesPerView: 1,
        spaceBetween: 20,
        loop: true,
        autoplay: {
            delay: 1500,
            disableOnInteraction: false,
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        breakpoints: {
            640: {
                slidesPerView: 2,
            },
            768: {
                slidesPerView: 3,
            },
            1024: {
                slidesPerView: 4,
            },
        },

        on: {
            init: equalizeSlideHeights,
            resize: equalizeSlideHeights,
        },
    });

    const swiper = new Swiper(".testimonialSwiper", {
        slidesPerView: 3,
         spaceBetween: 25,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
    });

    initMarquee(".marquee-track-1", "right", 45);
    initMarquee(".marquee-track-2", "left", 60);
});

function initMarquee(selector, direction = "left", speed = 0) {
    const marquee = document.querySelector(selector);
    if (!marquee) return;

    const totalWidth = marquee.scrollWidth / 2;

    gsap.killTweensOf(marquee);

    if (direction === "left") {
        gsap.fromTo(
            marquee,
            { x: 0 },
            {
                x: -totalWidth,
                duration: speed,
                ease: "linear",
                repeat: -1,
            }
        );
    } else {
        gsap.fromTo(
            marquee,
            { x: -totalWidth },
            {
                x: 0,
                duration: speed,
                ease: "linear",
                repeat: -1,
            }
        );
    }
}

window.addEventListener("resize", () => {
    initMarquee(".marquee-track-1", "right", 45);
    initMarquee(".marquee-track-2", "left", 60);
});

$(document).ready(function () {
    $("#nextStepBtn").click(function () {
        console.log("clicked");
    });
});
