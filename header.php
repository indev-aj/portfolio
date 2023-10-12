<?php include("./admin/service/db.php") ?>

<!-- Navbar -->
<div class="header-container">
    <div class="logo" onclick="location.href = './index.php';"><img src="./images/indev-stroke.png"></div>
    <div class="navbar">
        <ul class="nav-list">
            <li><a href="./index.php">About</a></li>
            <li><a href="./project.php">Projects</a></li>
            <li><a href="./resume.php">Resume</a></li>
            <li><a href="./contact.php">Contact</a></li>
        </ul>
        <div class="theme-switcher" onclick="changeTheme()">
            <img src="./icons/light-mode-icon.png" id="theme-switcher-img">
        </div>
        <div class="hamburger" onclick="menu()">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
        </div>
    </div>
</div>

<script src="./script.js"></script>

