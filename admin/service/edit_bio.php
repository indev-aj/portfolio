<?php

include_once('./db.php');
session_start();

if (isset($_REQUEST)) {

    
    // Get user's data from db
    $username = $_SESSION['username'];
    $user = $_SESSION['user'];
    
    // thumbnail's folder
    $folder = "../../thumbnail/" . $user['id'] . "/bio/";

    $name = !empty($_POST["name"]) ? $conn->real_escape_string($_POST['name']) : $user['name'];
    $phone = !empty($_POST["phone"]) ? $conn->real_escape_string($_POST['phone']) : $user['phone'];
    $email = !empty($_POST["email"]) ? $conn->real_escape_string($_POST['email']) : $user['email'];
    $location = !empty($_POST["location"]) ? $conn->real_escape_string($_POST['location']) : $user['location'];
    $summary = !empty($_POST["input-summary"]) ? $conn->real_escape_string($_POST['input-summary']) : $user['summary'];

    // Alter db's value
    $sql = "UPDATE User SET name=?, phone=?, email=?, location=?, summary=? WHERE username=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $name, $phone, $email, $location, $summary, $username);

    echo $name, $phone, $email, $location, $summary, $username;
    if ($stmt->execute()) {
        $stmt->close();

        header("Location: https://indevtechnology.com/portfolio/admin/bio.php");
    } else {
        echo "Error: " . $stmt->error;
        $stmt->close();

        // header("Location: https://indevtechnology.com/portfolio/admin/register.php");
    }
}