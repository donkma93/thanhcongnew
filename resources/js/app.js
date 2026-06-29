import './bootstrap';

// Import Swiper
import Swiper from 'swiper/bundle';
import 'swiper/css/bundle';

// Import AOS
import AOS from 'aos';
import 'aos/dist/aos.css';

// Initialize
document.addEventListener('DOMContentLoaded', () => {
    // Initialize AOS
    AOS.init({
        duration: 800,
        once: true,
        offset: 100,
    });

    // Initialize Hero Swiper
    const heroSwiper = new Swiper('.hero-swiper', {
        loop: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        effect: 'fade',
        fadeEffect: {
            crossFade: true
        },
    });

    // Initialize Scholarship Swiper
    const scholarshipSwiper = new Swiper('.scholarship-swiper', {
        slidesPerView: 1,
        spaceBetween: 20,
        loop: true,
        navigation: {
            nextEl: '.scholarship-next',
            prevEl: '.scholarship-prev',
        },
        breakpoints: {
            640: {
                slidesPerView: 2,
                spaceBetween: 20,
            },
            1024: {
                slidesPerView: 2, // Show 2 cards as per design image usually implies, or 2.5
                spaceBetween: 30,
            },
        },
        autoplay: {
            delay: 4000,
            disableOnInteraction: false,
        },
    });

    // Initialize Testimonials Swiper
    const testimonialsSwiper = new Swiper('.testimonials-swiper', {
        slidesPerView: 1,
        spaceBetween: 30,
        loop: true,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.testimonials-next',
            prevEl: '.testimonials-prev',
        },
        breakpoints: {
            640: {
                slidesPerView: 2,
                spaceBetween: 20,
            },
            1024: {
                slidesPerView: 3,
                spaceBetween: 30,
            },
        },
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
    });

    const achievementsSwiper = new Swiper('.achievements-swiper', {
        slidesPerView: 1,
        spaceBetween: 30,
        loop: true,
        pagination: {
            el: '.achievements-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.achievements-next',
            prevEl: '.achievements-prev',
        },
        breakpoints: {
            640: {
                slidesPerView: 2,
                spaceBetween: 20,
            },
            1024: {
                slidesPerView: 3,
                spaceBetween: 30,
            },
        },
        autoplay: {
            delay: 4500,
            disableOnInteraction: false,
        },
    });


});
