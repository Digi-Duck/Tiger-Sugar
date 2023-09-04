AOS.init({
    duration: 800,
});
// let animationPlayed = false;

// function blackSugarDelay(number) {
//     document.querySelector('.black-sugar').setAttribute('data-aos-duration', 800)
// }
// setTimeout(blackSugarDelay, 3000);




const scrollImg = document.querySelector(".about-us-scroll-img");
const aboutSection = document.querySelector("#about");
let scrollPosition = 0;
const sectionHeight = aboutSection.clientHeight;
const minScrollPosition = -sectionHeight * 0.1; // 控制上
const maxScrollPosition = sectionHeight * 0.52; // 控制下限
const scrollSpeed = 0.5;

document.addEventListener("wheel", (event) => {
    const deltaY = event.deltaY * scrollSpeed;
    scrollPosition += deltaY;
    console.log(minScrollPosition);
    console.log(maxScrollPosition);
    if (scrollPosition < minScrollPosition) {
        scrollPosition = minScrollPosition;
    }
    if (scrollPosition > maxScrollPosition) {
        scrollPosition = maxScrollPosition;
    }
    console.log(scrollPosition);
    scrollImg.style.transform = `translateY(${scrollPosition}px)`;
    event.preventDefault();
});