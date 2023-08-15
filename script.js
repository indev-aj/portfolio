const currentLocation = location.href;
const navbar = document.getElementsByClassName("header-container");
const links = navbar[0].querySelectorAll("a");

const hamburger = document.querySelector(".hamburger");
const navlist = document.querySelector(".nav-list");

hamburger.addEventListener("click", () => {
    hamburger.classList.toggle("active");
    navlist.classList.toggle("active");
})

// Set active class to change the styling on navbar items
// Skip the first element cuz that's logo
for (let i = 1; i < links.length; i++) {
    if (links[i].href === currentLocation || (currentLocation.endsWith("/") && links[i].href.endsWith("index.php"))) {
        links[i].className = "active";
    }
}

document.addEventListener("DOMContentLoaded", function () {
    var savedTheme = localStorage.getItem("theme");
    if (savedTheme === "light-mode") {
        document.body.classList.toggle("light-mode");
        for (let i = 0; i < links.length; i++) {
            links[i].style.color = "black";
        }
    }
});

// Change theme to light
let switchButton = document.getElementsByClassName("theme-switcher");
let body = document.body;
function changeTheme() {
    body.classList.toggle("light-mode");

    if (body.classList.contains("light-mode")) {
        for (let i = 0; i < links.length; i++) {
            links[i].style.color = "black";
        }

        localStorage.setItem("theme", "light-mode");
    } else {
        for (let i = 0; i < links.length; i++) {
            links[i].style.color = "white";
        }

        localStorage.removeItem("theme");
    }
}
