<?php

include_once('./db.php');
require_once('./helper.php');
session_start();

if (isset($_REQUEST)) {
    $username = $_SESSION['username'];
    $user = $_SESSION['user'];

    $title = !empty($_POST["title"]) ? $conn->real_escape_string($_POST['title']) : "";
    $subtitle = !empty($_POST["subtitle"]) ? $conn->real_escape_string($_POST['subtitle']) : "";
    $summary = !empty($_POST["input-summary"]) ? $conn->real_escape_string($_POST['input-summary']) : "";

    // Get uploaded image
    if (isset($_FILES["thumbnail"]) && $_FILES["thumbnail"]["error"] == UPLOAD_ERR_OK) {
        // thumbnail's folder
        $target_dir = "../thumbnail/" . $user['id'] . "/project/" . $title . "/";
        $target_file = $target_dir . basename($_FILES["thumbnail"]["name"]);

        $tempPath = $_FILES["thumbnail"]["tmp_name"];

        // Create the target directory if it doesn't exist
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true); // Adjust permissions as needed
        }

        $imageQuality = 35;
        $compressedImg = compressImg($tempPath, $target_dir, $imageQuality);

        // Move the uploaded file to the specified directory
        if (move_uploaded_file($compressedImg, $target_file)) {
            echo "The file " . basename($_FILES["thumbnail"]["name"]) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "Error during file upload.";
        $uploadError = $_FILES["thumbnail"]["error"];
        echo $uploadError;
        switch ($uploadError) {
            case UPLOAD_ERR_OK:
                // File uploaded successfully
                break;
            case UPLOAD_ERR_INI_SIZE:
                echo "The uploaded file exceeds the upload_max_filesize directive in php.ini.";
                break;
            case UPLOAD_ERR_FORM_SIZE:
                echo "The uploaded file exceeds the MAX_FILE_SIZE directive in the HTML form.";
                break;
            case UPLOAD_ERR_PARTIAL:
                echo "The uploaded file was only partially uploaded.";
                break;
            case UPLOAD_ERR_NO_FILE:
                echo "No file was uploaded.";
                break;
            case UPLOAD_ERR_NO_TMP_DIR:
                echo "Missing a temporary folder for storing uploaded files.";
                break;
            case UPLOAD_ERR_CANT_WRITE:
                echo "Failed to write the uploaded file to disk.";
                break;
            case UPLOAD_ERR_EXTENSION:
                echo "A PHP extension stopped the file upload.";
                break;
            default:
                echo "An unknown error occurred during file upload.";
        }
    }

    // Alter db's value
    $sql = "INSERT INTO Project (user_id, title, subtitle, summary, thumbnail) VALUES (?,?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("dssss", $user['id'], $title, $subtitle, $summary, $target_file);

    if ($stmt->execute()) {
        $stmt->close();

        // header("Location: https://indevtechnology.com/portfolio/admin/project.php");
        // exit();
    } else {
        echo "Error: " . $stmt->error;
        $stmt->close();

        // header("Location: https://indevtechnology.com/portfolio/admin/register.php");
    }
}

