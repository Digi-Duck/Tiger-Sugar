let bg = document.querySelector('.bg');
let bgCenter = document.querySelector('.bg-center');
let bgCover = document.querySelector('.bg-cover');
let bgLeftMilkShadow = document.querySelector('.bg-left-milk-shadow');
let bgLeftDrinks = document.querySelector('.bg-left-drinks');
let bgLeftMilk = document.querySelector('.bg-left-milk');
let bgLeftTiger = document.querySelector('.bg-left-tiger');
let bgRightMilk = document.querySelector('.bg-right-milk');
let bgRightDrinks = document.querySelector('.bg-right-drinks');

const coverPos = document.querySelector('.trans-cover');
coverPos.addEventListener('mousemove', shadow);

function shadow(e) {
    const { offsetWidth: width, offsetHeight: height } = coverPos;
    let { offsetX: x, offsetY: y } = e;

    // 考慮進-50，滑鼠在畫面中心時增長值即為0
    const xMove = Math.floor(((x / width) * 100) - 50);
    const yMove = Math.floor(((y / height) * 100) - 50);

    // 縮放的部分，若比例上超過100%，則搖擺方向會與滑鼠方向相反
    // 若比例上小於100%，則搖擺方向會與滑鼠方向相同
    //第3小
    bg.style.backgroundPosition = `${50 + (xMove / 4)}% ${-5 + (yMove / 6)}%`;

    //第2小
    bgCenter.style.backgroundPosition = `${50 - (xMove / 6)}% ${50 + (yMove / 8)}%`;

    //最小
    bgCover.style.backgroundPosition = `${50 + (xMove / 10)}% ${-5 + (yMove / 10)}%`;

    //第3大
    bgLeftMilkShadow.style.backgroundPosition = `${-150 - (xMove * 1)}% ${0 + (yMove / 2)}%`;

    //第3大
    bgLeftDrinks.style.backgroundPosition = `${-150 - (xMove * 1)}% ${0 + (yMove / 2)}%`;

    //第2大
    bgLeftMilk.style.backgroundPosition = `${-150 - (xMove * 1.2)}% ${0 + (yMove / 1.5)}%`;

    //最大
    bgLeftTiger.style.backgroundPosition = `${-150 - (xMove * 4.2)}% ${0 + (yMove * 1)}%`;

    //第3大
    bgRightMilk.style.backgroundPosition = `${200 - (xMove * 1)}% ${-30 + (yMove / 2)}%`;

    //第2大
    bgRightDrinks.style.backgroundPosition = `${200 - (xMove * 1.2)}% ${20 + (yMove / 1.5)}%`;
}