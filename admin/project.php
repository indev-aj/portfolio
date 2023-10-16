<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin: Project</title>

    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Poppins" />
</head>

<body>

    <div class="container">

        <?php include_once('./header.php') ?>

        <div class="main-section">
            <div class="page-title">Add New Project</div>
            <div class="card">
                <form action="./service/add_project.php" method="post" enctype="multipart/form-data">
                    <div class="column">
                        <div class="col-item">
                            <label for="title">title</label>
                            <input type="text" name="title" id="title" placeholder="Give a title" required>
                        </div>
                        <div class="col-item">
                            <label for="year">Subtitle</label>
                            <input type="text" name="subtitle" id="subtitle" placeholder="eg. Final year project" required>
                        </div>
                    </div>
                    <label for="input-summary">summary</label>
                    <input type="text" name="input-summary" id="input-summary" style="display: none">
                    <div contenteditable="true" class="input-summary" data-placeholder="Enter text here"></div>

                    <!-- Image Content -->
                    <div class="column">
                        <div class="col-item">
                            <label for="thumbnail">thumbnail</label>
                            <input type="file" name="thumbnail" id="thumbnail">
                            <div class="upload-area">
                                <img src="../icons/upload.png" alt="">
                                <p>Drag and Drop Image Over Here</p>
                            </div>
                        </div>
                        <div class="col-item">
                            <label class="preview-label">thumbnail preview</label>

                            
                            <img src="<?php if(!empty($user['thumbnail']))  echo "admin/" . $user['thumbnail']; else echo "../images/350x250.svg";?>" alt="" class="preview-img preview-img-project">
                        </div>
                    </div>

                    <input type="submit" value="submit" name='submit' class="submit-btn" onclick="getSummary()">
                </form>
            </div>

            <?php include('./service/retrieve_project.php'); ?>
        </div>

    </div>

</body>

</html>
