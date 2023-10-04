<?php
session_start();
// Destroy session
if(session_destroy()) {
    // Redirecting To Home Page
    header("Location: https://indevtechnology.com/portfolio/admin/index.php");
}