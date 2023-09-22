var swiperDistributionContainer = new Swiper("#distribution-container .mySwiper-distribution-container", {
  slidesPerView: 1,
  spaceBetween: 0,
  navigation: {
    nextEl: ".swiper-button-distribution-container .swiper-button-next",
    prevEl: ".swiper-button-distribution-container .swiper-button-prev",
  },
  breakpoints: {
    768: {
      slidesPerView: 4,
      spaceBetween: 0,
    },
    415: {
      slidesPerView: 3,
      spaceBetween: 0,
    },
    295: {
      slidesPerView: 2,
      spaceBetween: 0,
    },
  }
});
