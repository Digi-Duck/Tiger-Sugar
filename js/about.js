AOS.init({
    duration: 800,
});


const scrollImg = document.querySelector(".about-us-scroll-img");
const aboutSection = document.querySelector("#about");
let scrollPosition = 0;
const sectionHeight = aboutSection.clientHeight;
const minScrollPosition = -sectionHeight * 0.1; // 控制上
const maxScrollPosition = sectionHeight * 0.52; // 控制下限
const scrollSpeed = 0.3;

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


