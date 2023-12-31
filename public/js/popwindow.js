var swiper = new Swiper(".my-pop-swiper", {
    loop: true,
    spaceBetween: 4,
    slidesPerView: 4,
    freeMode: true,
    watchSlidesProgress: true,
    direction: 'horizontal',
    breakpoints: {
        768: {
            direction: 'vertical',
        },
    },
});
function destroySwiper() {
    swiper.destroy();
    swiperSub.destroy();
    swiper = new Swiper(".my-pop-swiper", {
        loop: true,
        spaceBetween: 4,
        slidesPerView: 4,
        freeMode: true,
        watchSlidesProgress: true,
        direction: 'horizontal',
        breakpoints: {
            768: {
                direction: 'vertical',
            },
        },
    });

    swiperSub = new Swiper(".my-pop-swiper-sub", {
        loop: true,
        spaceBetween: 4,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        pagination: {
            el: '.swiper-pagination',
            type: 'fraction',
        },
        thumbs: {
            swiper: swiper,
        },
    });
}

// sub swiper
var swiperSub = new Swiper(".my-pop-swiper-sub", {
    loop: true,
    spaceBetween: 4,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    pagination: {
        el: '.swiper-pagination',
        type: 'fraction',
    },
    thumbs: {
        swiper: swiper,
    },
});

//下方swiper
var swiperCommidity = new Swiper(".pop-window-bottom-swiper", {
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

//  table選單

document.addEventListener('DOMContentLoaded', function () {
    const navDropDownLeft = document.querySelector('.drop-down-content');
    const navDropDownMiddle = document.querySelector('.drop-down-warn');
    const navDropDownRight = document.querySelector('.drop-down-video');
    const contentLeft = document.querySelector('.content-left');
    const contentMiddle = document.querySelector('.content-middle');
    const contentRight = document.querySelector('.content-right');

    if (navDropDownLeft.checked) {
        contentLeft.style.display = 'block';
    } else if (navDropDownMiddle.checked) {
        contentMiddle.style.display = 'block';
    } else if (navDropDownRight.checked) {
        contentRight.style.display = 'block';
    }
    navDropDownLeft.addEventListener('click', () => {
        contentLeft.style.display = 'block';
        contentMiddle.style.display = 'none';
        contentRight.style.display = 'none';

        navDropDownLeft.classList.add('active');
        navDropDownMiddle.classList.remove('active');
        navDropDownRight.classList.remove('active');
    });

    navDropDownMiddle.addEventListener('click', () => {
        contentLeft.style.display = 'none';
        contentMiddle.style.display = 'block';
        contentRight.style.display = 'none';

        navDropDownLeft.classList.remove('active');
        navDropDownMiddle.classList.add('active');
        navDropDownRight.classList.remove('active');
    });

    navDropDownRight.addEventListener('click', () => {
        contentLeft.style.display = 'none';
        contentMiddle.style.display = 'none';
        contentRight.style.display = 'block';

        navDropDownLeft.classList.remove('active');
        navDropDownMiddle.classList.remove('active');
        navDropDownRight.classList.add('active');
    });
});

AOS.init({
    duration: 800,
  });
