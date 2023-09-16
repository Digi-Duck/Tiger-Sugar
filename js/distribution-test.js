function openPopup(event) {
    console.log(openPopup);
    event.preventDefault(); 
    var popup = document.querySelector("#pop-window .im-pop-window");
    if (popup) {
        popup.style.display = "block";
    }
}


function closePopup(event) {
    event.preventDefault(); 
    var popup = document.querySelector("#pop-window .im-pop-window");
    if (popup) {
        popup.style.display = "none";
    }
}