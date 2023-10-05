<?php
include("./service/auth_session.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin: Bio</title>

    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Poppins" />
</head>

<body>

    <div class="container">

        <?php

        include_once('./header.php');

        $username = $_SESSION['username'];
        $sql = "SELECT * FROM User where username='$username'";
        $result = $conn->query($sql);

        $user;

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
        }

        $_SESSION['user'] = $user;

        ?>

        <div class="main-section">
            <div class="page-title">Edit Personal Information</div>
            <div class="card">
                <form action="./service/edit_bio.php" method="post">
                    <div class="column">
                        <div class="col-item">
                            <label for="name">name</label>
                            <input type="text" name="name" id="name" placeholder="eg. John Doe" value="<?php echo $user['name']; ?>" required>
                        </div>
                        <div class="col-item">
                            <label for="phone">phone</label>
                            <input type="text" name="phone" id="phone" placeholder="eg. +60xxxxxxxx" value="<?php echo $user['phone']; ?>" required>
                        </div>
                    </div>
                    <div class="column">
                        <div class="col-item">
                            <label for="email">email</label>
                            <input type="text" name="email" id="email" placeholder="eg. email@example.org" value="<?php echo $user['email']; ?>" required>
                        </div>
                        <div class="col-item">
                            <label for="location">location</label>
                            <input type="text" name="location" id="location" placeholder="eg. Okinawa" value="<?php if ($user['location'] != "") echo $user['location']; else echo "eg. Okinawa"; ?>" required>
                        </div>
                    </div>
                    <label for="input-summary">summary</label>
                    <input type="text" name="input-summary" id="input-summary" style="display: none">
                    <div contenteditable="true" class="input-summary" data-placeholder="Enter text here"><?php echo $user['summary'];?></div>

                    <!-- Image Content -->
                    <div class="column">
                        <div class="col-item">
                            <label>thumbnail</label>
                            <input type="file" id="thumbnail" style="display: none;">
                            <div class="upload-area" onclick="document.getElementById('thumbnail').click()">
                                <img src="../icons/upload.png" alt="">
                                <p>Drag and Drop Image Over Here</p>
                            </div>
                        </div>
                        <div class="col-item">
                            <label class="preview-label">thumbnail preview</label>
                            <img src="../images/115x140.svg" alt="" class="preview-img">
                        </div>
                    </div>

                    <!-- Speaking Content -->

                    <div class="speaking-container">
                        <div class="input-task-container">
                            <label for="input-task">Language</label>
                            <input type="text" name="input-task" id="input-task" style="display: none">
                            <div contenteditable="true" class="input-task" data-placeholder="Enter text here"></div>
                            <input type="button" value="Add Language" name="add-task" class="add-task-btn">
                        </div>
                        <div class="delete-btn">
                            <img src="../icons/cross.png" alt="">
                        </div>
                    </div>

                    <input type="submit" value="submit" name='submit' class="submit-btn" onclick="getSummary()">
                </form>
            </div>
        </div>

    </div>

    <script>
        document.getElementById('thumbnail').addEventListener('change', function() {
    const uploadArea = document.querySelector('.upload-area');
    const previewImg = document.querySelector('.preview-img');
    
    const file = this.files[0]; // Get the selected file
    console.log("here we goo");

    if (file) {
        console.log("imge selected");
        // Display the selected file's name in the upload-area
        uploadArea.innerHTML = `
            <img src="../icons/upload.png" alt="">
            <p>${file.name}</p>
        `;

        // Optionally, you can also display a preview of the selected image
        const reader = new FileReader();
        reader.onload = function(e) {
            previewImg.src = e.target.result;
        };
        reader.readAsDataURL(file);
    } else {
        console.log("noooooo");
        // If no file is selected, restore the default content
        uploadArea.innerHTML = `
            <img src="../icons/upload.png" alt="">
            <p>Click here or Drag and Drop Image Over Here</p>
        `;
        previewImg.src = "../images/115x140.svg";
    }
});
    </script>
</body>

</html>