<?

require_once('./service/db.php'); ?>

<!-- Navbar -->
<div class="header-container">
    <div class="logo"><a href="./index.php">INDEV</a></div>
    <div class="navbar">
        <ul class="nav-list">
            <li><a href="./project.php">Project</a></li>
            <li><a href="./experience.php">Experience</a></li>
            <li><a href="./award.php">Award</a></li>
            <li><a href="./skill.php">Skill</a></li>
            <li><a href="./bio.php">Bio</a></li>
        </ul>
    </div>

    <div class="hamburger" onclick="menu()" style="display: none;">
        <div class="bar"></div>
        <div class="bar"></div>
        <div class="bar"></div>
    </div>
</div>

<script src="../script.js"></script>