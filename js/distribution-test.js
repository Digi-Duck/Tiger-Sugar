function closePopup(event) {
    event.preventDefault(); // 防止默認連接操作
    document.querySelector('.im-pop-window').style.display = 'none';
}

const openPopWindows = document.querySelectorAll('.open-pop-window');
openPopWindows.forEach(function(btn) {
    btn.addEventListener('click', function (event) {
        event.preventDefault();
        document.querySelector('.im-pop-window').style.display ='block';
        console.log('123');
    });
});

const closePopWindows = document.querySelectorAll('.pop-window-close');
closePopWindows.forEach(function(btn) {
    btn.addEventListener('click', function (event) {
        event.preventDefault();
        document.querySelector('.im-pop-window').style.display ='none';
        console.log('321');
    });
});

// function openPopup(event) {
//     event.preventDefault(); // 防止默認連接操作
//     document.querySelector('.im-pop-window').style.display = 'block';
//     console.log('123');
// }

// function closePopup(event) {
//     event.preventDefault(); // 防止默認連接操作
//     document.querySelector('.im-pop-window').style.display = 'none';
// }