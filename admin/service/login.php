<?php

include_once('./db.php');

if (isset($_POST['login'])) {
    $username = !empty($_POST["username"]) ? $conn->real_escape_string($_POST['username']) : "";
    $password = !empty($_POST["password"]) ? $conn->real_escape_string($_POST['password']) : "";

    $sql = "SELECT * FROM User";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if ($username == $row['username'] && password_verify($password, $row['password'])) {
                header("Location: https://indevtechnology.com/portfolio/admin/bio.php");
            }
        }
    } else {
        echo "0 result";
    }
}
