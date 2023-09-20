let menuShow = document.querySelector('header .mine-menu');
let navToggler = document.querySelector('header .btn');

navToggler.addEventListener('click', function () {
  menuShow.classList.toggle('show');
})

var swiper = new Swiper(".header-swiper-container", {
  navigation: {
    nextEl: ".swiper-btn-right",
    prevEl: ".swiper-btn-left",
  },
});