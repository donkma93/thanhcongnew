document.addEventListener('DOMContentLoaded', function () {
    if (typeof AOS !== 'undefined') {
        AOS.init({
            duration: 800,
            once: true,
            offset: 100,
        });
    }

    if (typeof Swiper === 'undefined') {
        return;
    }

    if (document.querySelector('.hero-swiper')) {
        new Swiper('.hero-swiper', {
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
                crossFade: true,
            },
        });
    }

    if (document.querySelector('.scholarship-swiper')) {
        new Swiper('.scholarship-swiper', {
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
                    slidesPerView: 2,
                    spaceBetween: 30,
                },
            },
            autoplay: {
                delay: 4000,
                disableOnInteraction: false,
            },
        });
    }

    if (document.querySelector('.testimonials-swiper')) {
        new Swiper('.testimonials-swiper', {
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
    }

    if (document.querySelector('.achievements-swiper')) {
        new Swiper('.achievements-swiper', {
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
    }
});
