function closePopup(event) {
    document.querySelector('.im-pop-window').style.display = 'none';
    document.querySelector('.window-overlay').style.display = 'none';
}

const openPopWindows = document.querySelectorAll('.open-pop-window');
openPopWindows.forEach(function(btn) {
    btn.addEventListener('click', function (event) {
        document.querySelector('.im-pop-window').style.display ='block';
        document.querySelector('.window-overlay').style.display = 'block';
        console.log('123');
    });
});

// closeBtn
const closePopWindows = document.querySelectorAll('.pop-window-close');
closePopWindows.forEach(function(btn) {
    btn.addEventListener('click', function (event) {
        document.querySelector('.im-pop-window').style.display ='none';
        document.querySelector('.window-overlay').style.display ='none';
        console.log('321');
    });
});

const overlayClose = document.querySelector('.window-overlay');
overlayClose.addEventListener('click',function(event) {
    if (event.target === overlayClose) {
        const closePop = document.querySelectorAll('.im-pop-window, .window-overlay');
        closePop.forEach(function(element) {
            element.style.display= 'none';
        });
    }
    console.log(overlayClose);
});
