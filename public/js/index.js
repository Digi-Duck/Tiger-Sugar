// banner
let bg = document.querySelector('.bg');
let bgCenter = document.querySelector('.bg-center');
let bgCover = document.querySelector('.bg-cover');
let bgLeftMilkShadow = document.querySelector('.bg-left-milk-shadow');
let bgLeftDrinks = document.querySelector('.bg-left-drinks');
let bgLeftMilk = document.querySelector('.bg-left-milk');
let bgLeftTiger = document.querySelector('.bg-left-tiger');
let bgRightMilk = document.querySelector('.bg-right-milk');
let bgRightDrinks = document.querySelector('.bg-right-drinks');

const coverPos = document.querySelector('.trans-cover');
coverPos.addEventListener('mousemove', shadow);

function shadow(e) {
  const { offsetWidth: width, offsetHeight: height } = coverPos;
  let { offsetX: x, offsetY: y } = e;

  // 考慮進-50，滑鼠在畫面中心時增長值即為0
  const xMove = Math.floor(((x / width) * 100) - 50);
  const yMove = Math.floor(((y / height) * 100) - 50);

  // 縮放的部分，若比例上超過100%，則搖擺方向會與滑鼠方向相反
  // 若比例上小於100%，則搖擺方向會與滑鼠方向相同
  //第3小
  bg.style.backgroundPosition = `${50 + (xMove / 4)}% ${-5 + (yMove / 6)}%`;

  //第2小
  bgCenter.style.backgroundPosition = `${50 - (xMove / 6)}% ${50 + (yMove / 8)}%`;

  //最小
  bgCover.style.backgroundPosition = `${50 + (xMove / 10)}% ${-5 + (yMove / 10)}%`;

  //第3大
  bgLeftMilkShadow.style.backgroundPosition = `${-150 - (xMove * 1)}% ${-10 + (yMove / 2)}%`;

  //第3大
  bgLeftDrinks.style.backgroundPosition = `${-150 - (xMove * 1)}% ${-10 + (yMove / 2)}%`;

  //第2大
  bgLeftMilk.style.backgroundPosition = `${-150 - (xMove * 1.2)}% ${-10 + (yMove / 1.5)}%`;

  //最大
  bgLeftTiger.style.backgroundPosition = `${-150 - (xMove * 4.2)}% ${-10 + (yMove * 1)}%`;

  //第3大
  bgRightMilk.style.backgroundPosition = `${200 - (xMove * 1)}% ${-30 + (yMove / 2)}%`;

  //第2大
  bgRightDrinks.style.backgroundPosition = `${200 - (xMove * 1.2)}% ${25 + (yMove / 1.5)}%`;
}

//banner
    var swiper = new Swiper(".banner-swiper", {
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      loop: true,
    });

// about
const scrollImg = document.querySelector(".about-us-scroll-img");
const aboutSection = document.querySelector("#about");
let scrollPosition = 0;
const sectionHeight = aboutSection.clientHeight;
const minScrollPosition = -sectionHeight * 0.1; // 控制上
const maxScrollPosition = sectionHeight * 0.35; // 控制下限
const scrollSpeed = 0.05;

document.addEventListener("wheel", (event) => {
  const deltaY = event.deltaY * scrollSpeed;
  scrollPosition += deltaY;
  if (scrollPosition < minScrollPosition) {
    scrollPosition = minScrollPosition;
  }
  if (scrollPosition > maxScrollPosition) {
    scrollPosition = maxScrollPosition;
  }
  scrollImg.style.transform = `translateY(${scrollPosition}px)`;
  event.preventDefault();
});


// social
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


// distribution
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


// media
var mediaSwiper = new Swiper(".media-swiper", {
  navigation: {
    nextEl: ".media-button-next",
    prevEl: ".media-button-prev",
  },
});

let toggleButtons = document.querySelectorAll('.volumn');

toggleButtons.forEach(element => {
  element.addEventListener('click', function () {
    let targetVideo = element.previousElementSibling;

    // 開啟
    if (targetVideo.muted) {
      targetVideo.muted = false;
      element.classList.remove("fa-volume-xmark");
      element.classList.add("fa-volume-high");

    }
    // 靜音
    else {
      targetVideo.muted = true;
      element.classList.remove("fa-volume-high");
      element.classList.add("fa-volume-xmark");
    }
  })
});


// news
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


// franchisee
AOS.init({
  duration: 800,
});
