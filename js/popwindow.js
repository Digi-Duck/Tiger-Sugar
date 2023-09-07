var swiper = new Swiper(".mySwiper", {
    loop: true,
    spaceBetween: 3,
    slidesPerView: 3,
    freeMode: true,
    watchSlidesProgress: true,
});

var swiper2 = new Swiper(".mySwiper2", {
    loop: true,
    spaceBetween: 3,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    thumbs: {
        swiper: swiper,
    },
});




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




