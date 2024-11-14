function carrossel() {
    var carrossel = document.querySelector(".banner-carrousel");
    var bannersAll = carrossel.querySelectorAll("figure");
    var windowWidth = window.innerWidth;

    carrossel.style.width = bannersAll.length * windowWidth + "px";

    for (var b = 0; b < bannersAll.length; b++) {
        bannersAll[b].style.width = windowWidth + "px";
    }

    var currentIndex = 0;

    setInterval(function() {
        currentIndex = (currentIndex + 1) % bannersAll.length;
        carrossel.style.transform = `translateX(-${currentIndex * windowWidth}px)`;
    }, 2000);
}

document.addEventListener("DOMContentLoaded", function() {
    carrossel();
});
