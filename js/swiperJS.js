var swiper = new Swiper("#social .mySwiper", {
  slidesPerView: 1,
  spaceBetween: 10,
  navigation: {
    nextEl: ".swiper-button .swiper-button-next",
    prevEl: ".swiper-button .swiper-button-prev",
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

var swiper2 = new Swiper("#distribution .mySwiper2", {
  slidesPerView: 1,
  spaceBetween: 30,
  navigation: {
    nextEl: ".swiper-button2 .swiper-button-next",
    prevEl: ".swiper-button2 .swiper-button-prev",
  },
  breakpoints: {
    992: {
      slidesPerView: 2,
      spaceBetween: 20,
    },
    1400: {
      slidesPerView: 3,
      spaceBetween: 24,
    }
  }
});

var swiper3 = new Swiper("#news .mySwiper3", {
  slidesPerView: 1,
  spaceBetween: 48,
  loop: true,
  navigation: {
    nextEl: ".swiper-button3 .swiper-button-next",
    prevEl: ".swiper-button3 .swiper-button-prev",
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

