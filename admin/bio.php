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
                <form action="./service/edit_bio.php" method="post" enctype="multipart/form-data">
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
                            <input type="text" name="location" id="location" placeholder="eg. Okinawa" value="<?php if ($user['location'] != "") echo $user['location'];
                                                                                                                else echo "eg. Okinawa"; ?>" required>
                        </div>
                    </div>
                    <label for="input-summary">summary</label>
                    <input type="text" name="input-summary" id="input-summary" style="display: none">
                    <div contenteditable="true" class="input-summary" data-placeholder="Enter text here"><?php echo $user['summary']; ?></div>

                    <!-- Image Content -->
                    <div class="column">
                        <div class="col-item">
                            <label>thumbnail</label>
                            <input type="file" name="thumbnail" id="thumbnail">
                            <div class="upload-area">
                                <img src="../icons/upload.png" alt="">
                                <p>Drag and Drop Image Over Here</p>
                            </div>
                        </div>
                        <div class="col-item">
                            <label class="preview-label">thumbnail preview</label>

                            
                            <img src="<?php if(!empty($user['thumbnail']))  echo "admin/" . $user['thumbnail']; else echo "../images/115x140.svg";?>" alt="" class="preview-img">
                        </div>
                    </div>

                    <!-- Speaking Content -->

                    <div class="speaking-container">
                        <div class="input-language-container">
                            <label for="input-language">Language (Seperate with comma)</label>
                            <input type="text" name="input-language" id="input-language" style="display: none">
                            <div contenteditable="true" class="input-language" data-placeholder="eg. English, Malay"><?php echo $user['language']; ?></div>
                            <!-- <input type="button" value="Add Language" name="add-task" class="add-task-btn" onclick="addLanguage()"> -->
                        </div>
                        <!-- <div class="delete-btn">
                            <img src="../icons/cross.png" alt="">
                        </div> -->
                    </div>

                    <input type="submit" value="submit" name='submit' class="submit-btn" onclick="getSummary()">
                </form>
            </div>
        </div>

    </div>

</body>

</html>