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
//       console.log('123');
//   });
// });

function getDate(date) {
    const objectDate = new Date(date);
    const year = objectDate.getFullYear();
    const month = objectDate.getMonth() + 1;
    const day = objectDate.getDate();
    return [year, month, day];
};

const openPopWindows = document.querySelectorAll('.open-pop-window');
openPopWindows.forEach(function (btn) {
    btn.addEventListener('click', function (event) {
        const data = JSON.parse(btn.children[1].value);
        document.querySelector('.im-pop-window').style.display = 'block';
        document.querySelector('.window-overlay').style.display = 'block';

        let popSwiper = document.querySelector('.poping-swiper');
        let popSwiperSub = document.querySelector('.poping-swiper-sub');
        popSwiper.innerHTML = '';
        popSwiperSub.innerHTML = '';
        data.products_imgs.forEach(item => {
            popSwiper.innerHTML += `<div class="swiper-slide swiper-pop-top-slide">
            <img src="${item.img_url}" alt="產品圖片" /> </div>`;
            popSwiperSub.innerHTML += `<div class="swiper-slide swiper-pop-top-slide poping-swiper-sub">
            <div class="pop-sub-border-img"> <img class="sub-img" src="${item.img_url}" alt="產品圖片" /> </div> </div>`
        });

        let contentTitle = document.querySelector('.content-text-title');
        contentTitle.innerHTML = `<div class="content-text-title">${data.title_zh}</div>`
        let contentTitleEn = document.querySelector('.content-text-title-eng');
        contentTitleEn.innerHTML = `<div class="content-text-title-eng">${data.title_en}</div>`
        let foodSort = document.querySelector('.content-text-sort');
        foodSort.innerHTML = `<div class="content-text-sort">分類：${data.products_type.tw_name}|${data.products_type.en_name}</div>`
        let infomation = document.querySelector('.content-text-product-describe');
        infomation.innerHTML = `<div class="content-text-product-describe">${data.info} </div>`;

        let date = document.querySelector('.listed-date');
        const [year, month, day] = getDate(data.launch_date);
        date.innerHTML = `<div class="listed-date">${year}
            <div class="unit">年</div>${month}
            <div class="unit">月</div>${day}
            <div class="unit">號</div>
        </div>`
        let weight = document.querySelector('.commodity-weight');
        weight.innerHTML = `<div class="commodity-weight-title">淨重</div>
        <div class="net-weight">${data.weight}</div>
        <div class="unit">克</div>`;
        let shelfLife = document.querySelector('.commodity-expiration');
        shelfLife.innerHTML = `<div class="commodity-expiration-title">保存期限</div>
        <div class="expiration-day">${data.shelf_life}</div>
        <div class="unit">個月</div>`;
        let preserve = document.querySelector('.commodity-preservation-method');
        preserve.innerHTML = `<div class="method-title">保存方式</div>
        <div class="method-text">${data.preserve}</div>`;
        let contentLeft = document.querySelector('.content-left');
        contentLeft.innerHTML = '';
        data.content.split('\r\n').forEach(item => {
            contentLeft.innerHTML += `<p>${item}</p>`;
        });
        let contentMiddle = document.querySelector('.content-middle');
        contentMiddle.innerHTML = '';
        data.notes.split('\r\n').forEach(item => {
            contentMiddle.innerHTML += `<p>${item}</p>`;
        });
        // let video = document.querySelector('.content-right');
        // video.innerHTML = `${data.video}`;
        // element.addEventListener('touchstart', function(event) {
            let video = document.querySelector('.content-right');
            const youtubeUrl = data.video;
            const iframe = document.createElement('iframe');
            iframe.src = "https://www.youtube.com/embed/VIDEO_ID";
            iframe.width = "560";
            iframe.height = "315";
            iframe.allowFullscreen = true;
            video.appendChild(iframe);
        // }, { passive: true });


        console.log(data.video);
    });
    // console.log(btn.children[1].value);
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
