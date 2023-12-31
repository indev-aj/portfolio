<?

require_once('./service/db.php'); 
include("./service/auth_session.php");
?>

<div class="header-container">
    <div class="logo"><a href="./bio.php">INDEV</a></div>
    <div class="navbar">
        <ul class="nav-list">
            <li><a href="./project.php">Project</a></li>
            <li><a href="./experience.php">Experience</a></li>
            <li><a href="./award.php">Award</a></li>
            <li><a href="./certificate.php">Certificate</a></li>
            <li><a href="./skill.php">Skill</a></li>
            <li><a href="./bio.php">Bio</a></li>
            <li><a href="./service/logout.php">Logout</a></li>
        </ul>
        <div class="hamburger" onclick="menu()">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
        </div>
    </div>
</div>

<script src="./script.js"></script>
<script src="../script.js"></script>