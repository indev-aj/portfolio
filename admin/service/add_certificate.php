<?php

include_once('./db.php');
session_start();

if (isset($_REQUEST)) {
    $username = $_SESSION['username'];
    $user = $_SESSION['user'];

    $title = !empty($_POST["title"]) ? $conn->real_escape_string($_POST['title']) : "";
    $date_issued = !empty($_POST["date-issued"]) ? $conn->real_escape_string($_POST['date-issued']) : "";
    

    // Get uploaded image
    if (isset($_FILES["thumbnail"]) && $_FILES["thumbnail"]["error"] == UPLOAD_ERR_OK) {
        // thumbnail's folder
        $target_dir = "../thumbnail/" . $user['id'] . "/certificate/$title/";
        $target_file = $target_dir . basename($_FILES["thumbnail"]["name"]);

        $tempPath=$_FILES["thumbnail"]["tmp_name"];

        // Create the target directory if it doesn't exist
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true); // Adjust permissions as needed
        }

        // Move the uploaded file to the specified directory
        if (move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $target_file)) {
            echo "The file " . basename($_FILES["thumbnail"]["name"]) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "Error during file upload.";
        $uploadError = $_FILES["thumbnail"]["error"];
        echo "error: " . $uploadError;
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
  
    // Add data into db
    $sql = "INSERT INTO Certificate (user_id, title, thumbnail, date) VALUES (?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("dsss", $user['id'], $title, $target_file, $date_issued);

    if ($stmt->execute()) {
        $stmt->close();

        header("Location: https://indevtechnology.com/portfolio/admin/certificate.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
        $stmt->close();

        // header("Location: https://indevtechnology.com/portfolio/admin/register.php");
    }
}