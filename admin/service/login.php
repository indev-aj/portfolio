<?php

include_once('./db.php');
session_start();

if (isset($_POST['login'])) {
    $username = !empty($_POST["username"]) ? $conn->real_escape_string($_POST['username']) : "";
    $password = !empty($_POST["password"]) ? $conn->real_escape_string($_POST['password']) : "";

    $query = "SELECT password FROM User WHERE username=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($stored_password);
    $stmt->fetch();
    $stmt->close();
    
    if (password_verify($password, $stored_password)) {
        $_SESSION['username'] = $username;
        echo "Username: " . $username;
        header("Location: https://indevtechnology.com/portfolio/admin/bio.php");
    } else {
        header("Location: https://indevtechnology.com/portfolio/admin/index.php");
    }
}
