import "./bootstrap";
import gsap from "gsap";

// Swiper core
import Swiper from "swiper/bundle";
import "swiper/css/bundle"; // includes core + navigation + pagination

function equalizeSlideHeights() {
    const slides = document.querySelectorAll(".swiper-slide");
    let maxHeight = 0;

    // Reset and measure
    slides.forEach((slide) => {
        slide.style.height = "auto";
        maxHeight = Math.max(maxHeight, slide.offsetHeight);
    });

    // Reduce height slightly (e.g., 10px less)
    const adjustedHeight = maxHeight - 30;

    // Apply adjusted height
    slides.forEach((slide) => {
        slide.style.height = adjustedHeight + "px";
    });
}

let resizeTimeout;
window.addEventListener("resize", () => {
    clearTimeout(resizeTimeout);
    resizeTimeout = setTimeout(equalizeSlideHeights, 150);
});

// Initialize Swiper
document.addEventListener("DOMContentLoaded", function () {
    new Swiper(".mySwiper", {
        slidesPerView: 1,
        spaceBetween: 20,
        loop: true,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
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

    //testimonial

    const swiper = new Swiper(".testimonialSwiper", {
        slidesPerView: 1,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
    });

    //marquee
    // gsap.to(".marquee-content", {
    //     xPercent: -50,
    //     repeat: -1,
    //     ease: "linear",
    //     duration: 10,
    // });

    const swiper1 = new Swiper(".marquee", {
        slidesPerView: 1.4,
        spaceBetween: 25,
        grabCursor: true,
        a11y: false,
        freeMode: true,
        speed: 22000,
        loop: true,
        autoplay: {
            delay: 0.5,
            disableOnInteraction: false,
            reverseDirection: false, // default
        },
        breakpoints: {
            1050: {
                slidesPerView: 4.4,
            },
        },
    });

    const swiper2 = new Swiper(".marquee-2", {
        slidesPerView: 1.4,
        spaceBetween: 25,
        grabCursor: true,
        a11y: false,
        freeMode: true,
        speed: 22000,
        loop: true,
        autoplay: {
            delay: 0.5,
            disableOnInteraction: false,
            reverseDirection: true, // default
        },
        breakpoints: {
            1050: {
                slidesPerView: 4.4,
            },
        },
    });

    // const marquee = document.querySelector(".marquee-track-1");

    // if (!marquee) return;

    // const totalWidth = marquee.scrollWidth / 2; // only scroll original content (not clone)

    // // Set the animation
    // gsap.fromTo(
    //     marquee,
    //     { x: 0 },
    //     {
    //         x: -totalWidth,
    //         duration: 30, // increase for slower
    //         ease: "linear",
    //         repeat: -1,
    //     }
    // );
});

function initMarquee(selector, direction = "left", speed = 30) {
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

document.addEventListener("DOMContentLoaded", () => {
    initMarquee(".marquee-track-1", "right", 20); // left to right
    initMarquee(".marquee-track-2", "left", 20); // right to left
});

window.addEventListener("resize", () => {
    initMarquee(".marquee-track-1", "right", 20);
    initMarquee(".marquee-track-2", "left", 20);
});
