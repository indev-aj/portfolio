<?php

include_once('./db.php');
session_start();

if (isset($_REQUEST)) {
    $username = $_SESSION['username'];
    $user = $_SESSION['user'];

    $title = !empty($_POST["title"]) ? $conn->real_escape_string($_POST['title']) : "";
    $company = !empty($_POST["company"]) ? $conn->real_escape_string($_POST['company']) : "";
    $date_from = !empty($_POST["date-from"]) ? $conn->real_escape_string($_POST['date-from']) : "";
    $date_to = !empty($_POST["date-to"]) ? $conn->real_escape_string($_POST['date-to']) : "";
    $work_type = !empty($_POST["work-type"]) ? $conn->real_escape_string($_POST['work-type']) : "";

    $inputTasks = $_POST["input-task"];

    // Loop through the input tasks
    foreach ($inputTasks as $task) {
        htmlspecialchars($task);
    }

    $task = serialize($inputTasks);

    // Add data into db
    $sql = "INSERT INTO Experience (user_id, title, company, start, end, task, type) VALUES (?,?,?,?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("dssssss", $user['id'], $title, $company, $date_from, $date_to, $task, $work_type);

    if ($stmt->execute()) {
        $stmt->close();

        header("Location: https://indevtechnology.com/portfolio/admin/experience.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
        $stmt->close();

        // header("Location: https://indevtechnology.com/portfolio/admin/register.php");
    }

}