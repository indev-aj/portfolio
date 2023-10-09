<?php

include_once('./db.php');
session_start();

if (isset($_REQUEST)) {
    $username = $_SESSION['username'];
    $user = $_SESSION['user'];

    $title = !empty($_POST["title"]) ? $conn->real_escape_string($_POST['title']) : "";
    $year = !empty($_POST["year"]) ? $conn->real_escape_string($_POST['year']) : "";
    $summary = !empty($_POST["input-summary"]) ? $conn->real_escape_string($_POST['input-summary']) : "";

    // Add data into db
    $sql = "INSERT INTO Award (user_id, title, year, summary) VALUES (?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("dsss", $user['id'], $title, $year, $summary);

    if ($stmt->execute()) {
        $stmt->close();

        header("Location: https://indevtechnology.com/portfolio/admin/award.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
        $stmt->close();

        // header("Location: https://indevtechnology.com/portfolio/admin/register.php");
    }

}