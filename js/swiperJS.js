var swiper = new Swiper("#social .mySwiper-social", {
  slidesPerView: 1,
  spaceBetween: 10,
  navigation: {
    nextEl: ".swiper-button-social .swiper-button-next",
    prevEl: ".swiper-button-social .swiper-button-prev",
  },
  breakpoints: {
    481: {
      slidesPerView: 2,
      spaceBetween: 30,
    },
    1200: {
      slidesPerView: 3,
      spaceBetween: 30,
    }
  }
});

var swiperProduct = new Swiper("#distribution .mySwiper-product", {
  slidesPerView: 1,
  spaceBetween: 30,
  navigation: {
    nextEl: ".swiper-button-product .swiper-button-next",
    prevEl: ".swiper-button-product .swiper-button-prev",
  },
  breakpoints: {
    992: {
      slidesPerView: 2,
      spaceBetween: 20,
    },
    1400: {
      slidesPerView: 3,
      spaceBetween: 12,
    }
  }
});

var swiperNews = new Swiper("#news .mySwiper-news", {
  slidesPerView: 1,
  spaceBetween: 48,
  loop: true,
  navigation: {
    nextEl: ".swiper-button-news .swiper-button-next",
    prevEl: ".swiper-button-news .swiper-button-prev",
  },
  breakpoints: {
    481: {
      slidesPerView: 2,
      spaceBetween: 30,
    },
    1200: {
      slidesPerView: 3,
      spaceBetween: 0,
    }
  }
});

var swiperDistributionContainer = new Swiper("#distribution-container .mySwiper-distribution-container", {
  slidesPerView: 1,
  spaceBetween: 0,
  navigation: {
    nextEl: ".swiper-button-distribution-container .swiper-button-next",
    prevEl: ".swiper-button-distribution-container .swiper-button-prev",
  },
  breakpoints: {
    991: {
      slidesPerView: 4,
      spaceBetween: 0,
    },
    768: {
      slidesPerView: 3,
      spaceBetween: 0,
    },
    415: {
      slidesPerView: 2,
      spaceBetween: 0,
    },
  }
});


