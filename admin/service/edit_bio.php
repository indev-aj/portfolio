<?php

include_once('./db.php');
session_start();

if (isset($_REQUEST)) {

    // Get user's data from db
    $username = $_SESSION['username'];
    $user = $_SESSION['user'];


    if (isset($_FILES["thumbnail"]) && $_FILES["thumbnail"]["error"] == UPLOAD_ERR_OK) {
        // ... Rest of your code for handling the file upload ...
        // thumbnail's folder
        $target_dir = "../thumbnail/" . $user['id'] . "/bio/";
        $target_file = $target_dir . basename($_FILES["thumbnail"]["name"]);

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
        switch ($uploadError) {
            case UPLOAD_ERR_OK:
                // File uploaded successfully
                // ... Rest of your code for handling the file upload ...
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
    
    $name = !empty($_POST["name"]) ? $conn->real_escape_string($_POST['name']) : $user['name'];
    $phone = !empty($_POST["phone"]) ? $conn->real_escape_string($_POST['phone']) : $user['phone'];
    $email = !empty($_POST["email"]) ? $conn->real_escape_string($_POST['email']) : $user['email'];
    $location = !empty($_POST["location"]) ? $conn->real_escape_string($_POST['location']) : $user['location'];
    $summary = !empty($_POST["input-summary"]) ? $conn->real_escape_string($_POST['input-summary']) : $user['summary'];
    $language = !empty($_POST["input-language"]) ? $conn->real_escape_string($_POST['input-language']) : $user['language'];


    // Alter db's value
    $sql = "UPDATE User SET name=?, phone=?, email=?, location=?, summary=?, language=?, thumbnail=? WHERE username=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssss", $name, $phone, $email, $location, $summary, $language, $target_file, $username);

    if ($stmt->execute()) {
        $stmt->close();

        header("Location: https://indevtechnology.com/portfolio/admin/bio.php");
    } else {
        echo "Error: " . $stmt->error;
        $stmt->close();

        // header("Location: https://indevtechnology.com/portfolio/admin/register.php");
    }
}
