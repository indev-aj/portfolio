<?php
    session_start();
    if(!isset($_SESSION["username"])) {
        header("Location: https://indevtechnology.com/portfolio/admin/index.php");
        exit();
    }
?>