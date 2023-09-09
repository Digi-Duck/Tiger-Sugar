var swiper = new Swiper(".my-swiper", {
    loop: true,
    spaceBetween: 4,
    slidesPerView: 4,
    freeMode: true,
    watchSlidesProgress: true,
    direction: 'vertical',
});

var swiper2 = new Swiper(".my-swiper-sub", {
    loop: true,
    spaceBetween: 4,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    thumbs: {
        swiper: swiper,
    },
});

// var swiperProduct = new Swiper("#pop-window .mySwiper-product", {
//     slidesPerView: 1,
//     spaceBetween: 30,
//     navigation: {
//         nextEl: ".swiper-button-product .swiper-button-next",
//         prevEl: ".swiper-button-product .swiper-button-prev",
//     },
//     breakpoints: {
//         992: {
//             slidesPerView: 2,
//             spaceBetween: 20,
//         },
//         1400: {
//             slidesPerView: 3,
//             spaceBetween: 12,
//         }
//     }
// });


// let appendNumber = 3;
// let prependNumber = 1;
// const swiper = new Swiper('.swiper', {
//     slidesPerView: 3,
//     centeredSlides: true,
//     spaceBetween: 30,
//     pagination: {
//         el: '.swiper-pagination',
//         type: 'fraction',
//     },
//     navigation: {
//         nextEl: '.swiper-button-next',
//         prevEl: '.swiper-button-prev',
//     },
//     virtual: {
//         slides: (function () {
//             const slides = [];
//             for (var i = 0; i < 3; i += 1) {
//                 slides.push('Slide ' + (i + 1));
//             }
//             return slides;
//         })(),
//     },
// });




