<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin: Bio</title>

    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="./style.css">
    <script src="./script.js"></script>
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Poppins" />
</head>

<body>

    <div class="container">

        <?php include_once('./header.php') ?>

        <div class="main-section">
            <div class="page-title">Edit Personal Information</div>
            <div class="card">
                <form action="" method="post">
                    <div class="column">
                        <div class="col-item">
                            <label for="name">name</label>
                            <input type="text" name="name" id="name" placeholder="John Smith" required>
                        </div>
                        <div class="col-item">
                            <label for="phone">phone</label>
                            <input type="text" name="phone" id="phone" placeholder="eg. +6012222222" required>
                        </div>
                    </div>
                    <div class="column">
                        <div class="col-item">
                            <label for="email">email</label>
                            <input type="text" name="email" id="email" placeholder="example@org.com" required>
                        </div>
                        <div class="col-item">
                            <label for="location">location</label>
                            <input type="text" name="location" id="location" placeholder="eg. Okinawa" required>
                        </div>
                    </div>
                    <label for="input-summary">summary</label>
                    <input type="text" name="input-summary" id="input-summary" style="display: none">
                    <div contenteditable="true" class="input-summary" data-placeholder="Enter text here"></div>

                    <!-- Image Content -->
                    <div class="column">
                        <div class="col-item" onclick="">
                            <label>thumbnail</label>
                            <div class="upload-area">
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
    </script>
</body>

</html>