<?php

include_once("./db.php");

if (isset($_POST['register'])) {
    $email = !empty($_POST["email"]) ? $conn->real_escape_string($_POST['email']) : "";
    $username = !empty($_POST["username"]) ? $conn->real_escape_string($_POST['username']) : "";
    $password = !empty($_POST["password"]) ? $conn->real_escape_string($_POST['password']) : "";
    $name = !empty($_POST["name"]) ? $conn->real_escape_string($_POST['name']) : "";
    $phone = !empty($_POST["phone"]) ? $conn->real_escape_string($_POST['phone']) : "";

    // hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // TODO: Check if username exist, username should be unique and can't be the same as others

    $sql = "INSERT INTO User (username, password, name, phone, email) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Error: " . $conn->error);
    }

    $stmt->bind_param("sssss", $username, $hashed_password, $name, $phone, $email);
    
    echo "something";
    if ($stmt->execute()) {
        echo "Data insertion succesfull!";
        $stmt->close();

        header("Location: https://indevtechnology.com/portfolio/admin/index.php");
    } else {
        echo "Error: " . $stmt->error;
        $stmt->close();

        header("Location: https://indevtechnology.com/portfolio/admin/register.php");
    }
}