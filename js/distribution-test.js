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

const closePopWindows = document.querySelectorAll('.pop-window-close');
closePopWindows.forEach(function(btn) {
    btn.addEventListener('click', function (event) {
        document.querySelector('.im-pop-window').style.display ='none';
        document.querySelector('.window-overlay').style.display = 'none';
        console.log('event.target');
    });
});
