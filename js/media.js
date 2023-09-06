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