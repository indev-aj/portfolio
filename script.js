const currentLocation = location.href;

const navbar = document.getElementsByClassName("header-container");
const links = navbar[0].querySelectorAll("a");

const hamburger = document.querySelector(".hamburger");
const hamburger_bar = document.querySelector(".bar");
const navlist = document.querySelector(".nav-list");

const themeSwitchImg = document.getElementById("theme-switcher-img");
const body = document.body;

function menu() {
    hamburger.classList.toggle("active");
    navlist.classList.toggle("active");
}

// Set active class to change the styling on navbar items
// Skip the first element cuz that's logo
for (let i = 0; i < links.length; i++) {
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
function changeTheme() {
    let darkIcon = "./icons/dark-mode-icon.png";
    let lightIcon = "./icons/light-mode-icon.png";

    let githubLight = "./icons/github.png";
    let githubDark = "./icons/github-dark.png";

    body.classList.toggle("light-mode");
    
    if (body.classList.contains("light-mode")) {
        themeSwitchImg.src = darkIcon;

        document.getElementById("github-img").src = githubDark;
        
        for (let i = 0; i < links.length; i++) {
            links[i].style.color = "black";
        }

        localStorage.setItem("theme", "light-mode");
    } else {
        themeSwitchImg.src = lightIcon;

        document.getElementById("github-img").src = githubLight;

        for (let i = 0; i < links.length; i++) {
            links[i].style.color = "white";
        }

        localStorage.removeItem("theme");
    }
}

function getSummary() {

    // get summary
    input_summary = document.getElementById("input-summary");
    summary = document.getElementsByClassName("input-summary")[0];
    
    input_summary.value = summary.innerText;
}