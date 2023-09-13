var openPopupLink = document.querySelector("#pop-window");
var popup = document.body;

openPopupLink.addEventListener("click", function () {
    if (popup.style.display === "none" || popup.style.display === "") {
        popup.style.display = "block";
    } else {
        popup.style.display = "none";
    }
});