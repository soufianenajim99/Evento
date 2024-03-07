let content = document.querySelector(".main-content");
let button = document.getElementById("button");
let buttonc = document.getElementById("buttonc");
let form = document.querySelector(".form");
button.addEventListener("click", function () {
    content.classList.toggle("hidden");
    form.classList.toggle("hidden");
});
buttonc.addEventListener("click", function () {
    content.classList.toggle("hidden");
    form.classList.toggle("hidden");
});
