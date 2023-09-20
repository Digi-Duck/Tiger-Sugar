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