import './bootstrap';

document.addEventListener("DOMContentLoaded", function () {
    const navbar = document.getElementById("main-navbar");
    const header = document.querySelector(".d-flex");

    if (!navbar || !header) {
        console.error("Navbar ou header introuvable !");
        return;
    }

    const headerHeight = header.offsetHeight;

    window.addEventListener("scroll", function () {
        if (window.scrollY >= headerHeight) {
            navbar.classList.add("fixed-top");
            document.body.style.paddingTop = `${navbar.offsetHeight}px`;
        } else {
            navbar.classList.remove("fixed-top");
            document.body.style.paddingTop = "0";
        }
    });
});

