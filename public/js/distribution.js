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

function closePopup(event) {
    document.querySelector('.im-pop-window').style.display = 'none';
    document.querySelector('.window-overlay').style.display = 'none';
}

// const openPopWindows = document.querySelectorAll('.open-pop-window');
// openPopWindows.forEach(function(btn) {
//   btn.addEventListener('click', function (event) {
//       document.querySelector('.im-pop-window').style.display ='block';
//       document.querySelector('.window-overlay').style.display = 'block';
//       console.log('123888');
//   });
// });

const openPopWindows = document.querySelectorAll('.open-pop-window');
openPopWindows.forEach(function (btn) {
    btn.addEventListener('click', function (event) {
        const data = JSON.parse(btn.children[1].value);
        document.querySelector('.im-pop-window').style.display = 'block';
        document.querySelector('.window-overlay').style.display = 'block';
        let popSwiper = document.querySelector('.poping-swiper');
        popSwiper.innerHTML = '';
        data.products_imgs.forEach(item => {
            popSwiper.innerHTML += `<div class="swiper-slide swiper-pop-top-slide">
            <img src="${item.img_url}" alt="產品圖片" /> </div>`;
        });
        let contentTitle = document.querySelector('.content-text-title');
        contentTitle.innerHTML = '';
        contentTitle.innerHTML += `<div class="content-text-title">${data.title_zh}</div>`
        let contentTitleEn = document.querySelector('.content-text-title-eng');
        contentTitleEn.innerHTML = '';
        contentTitleEn.innerHTML += `<div class="content-text-title-eng">${data.title_en}</div>`
        let foodSort = document.querySelector('.content-text-sort');
        foodSort.innerHTML = '';
        foodSort.innerHTML += `<div class="content-text-sort">分類：${data.products_type.tw_name}|${data.products_type.en_name}</div>`
        let infomation = document.querySelector('.content-text-product-describe');
        infomation.innerHTML = '';
        infomation.innerHTML += `<div class="content-text-product-describe">${data.info} </div>`
        let date = document.querySelector('.listed-date');
        date.innerHTML = '';
        date.innerHTML += `<div class="listed-date">${data.date}
        <div class="unit">年</div>06
        <div class="unit">月</div>24
        <div class="unit">號</div>
    </div>`

        console.log(data);
    });
    console.log(btn.children[1].value);
});

// closeBtn
const closePopWindows = document.querySelectorAll('.pop-window-close');
closePopWindows.forEach(function (btn) {
    btn.addEventListener('click', function (event) {
        document.querySelector('.im-pop-window').style.display = 'none';
        document.querySelector('.window-overlay').style.display = 'none';
    });
});

const overlayClose = document.querySelector('.window-overlay');
overlayClose.addEventListener('click', function (event) {
    if (event.target === overlayClose) {
        const closePop = document.querySelectorAll('.im-pop-window, .window-overlay');
        closePop.forEach(function (element) {
            element.style.display = 'none';
        });
    }
    console.log(overlayClose);
});

AOS.init({
    duration: 800,
});
