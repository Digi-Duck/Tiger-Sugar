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


// header
let menuShow = document.querySelector('header .mine-menu');
let navToggler = document.querySelector('header .btn');
let dropAbout = document.querySelector('header #drop-about');
let dropDistribution = document.querySelector('header #drop-distribution');
let dropClassic = document.querySelector('header #drop-classic');
let dropMedia = document.querySelector('header #drop-media');
let dropFranchisee = document.querySelector('header #drop-franchisee');


navToggler.addEventListener('click', function () {
  menuShow.classList.toggle('show');
})
dropAbout.addEventListener('click', function() {
  menuShow.classList.remove('show');
})
dropDistribution.addEventListener('click', function() {
  menuShow.classList.remove('show');
})
dropClassic.addEventListener('click', function() {
  menuShow.classList.remove('show');
})
dropMedia.addEventListener('click', function() {
  menuShow.classList.remove('show');
})
dropFranchisee.addEventListener('click', function() {
  menuShow.classList.remove('show');
})


var swiper = new Swiper(".header-swiper-container", {
  navigation: {
    nextEl: ".header-button-next",
    prevEl: ".header-button-prev",
  },
});