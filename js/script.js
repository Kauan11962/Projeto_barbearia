let items = document.querySelectorAll(".slider .item");
let next = document.getElementById("next");
let prev = document.getElementById("prev");

let active = 0; // Define o slide inicial
function loadShow() {
  items.forEach((item, index) => {
    item.classList.remove("active");
    if (index === active) {
      item.classList.add("active");
    }
  });
}

loadShow();

next.onclick = function () {
  active = (active + 1) % items.length; // Move para o próximo slide
  loadShow();
};

prev.onclick = function () {
  active = (active - 1 + items.length) % items.length; // Move para o slide anterior
  loadShow();
};
