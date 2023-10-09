<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin: Skill</title>

    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Poppins" />
</head>

<body>

    <div class="container">

        <?php include_once('./header.php') ?>

        <div class="main-section">
            <div class="page-title">Add New Skill</div>
            <div class="card">
                <form action="./service/add_skill.php" method="post" enctype="multipart/form-data">
                    <div class="column">
                        <div class="col-item">
                            <label for="title">title</label>
                            <input type="text" name="title" id="title" placeholder="Give a title" required>
                        </div>
                        <div class="col-item">
                            <label for="skill-type">Type</label>
                            <select name="skill-type" id="skill-type" class="skill-dropdown">
                                <option value="programming">Progamming Language</option>
                                <option value="framework">Framework</option>
                                <option value="software">Software</option>
                                <option value="hardware">Hardware</option>
                                <option value="others">Others</option>
                            </select>
                        </div>
                    </div>

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

                            
                            <img src="<?php if(!empty($user['thumbnail']))  echo "admin/" . $user['thumbnail']; else echo "../images/74x74.svg";?>" alt="" class="preview-img preview-img-skill">
                        </div>
                    </div>

                    <input type="submit" value="submit" name='submit' class="submit-btn">
                </form>
            </div>
        </div>

    </div>

    <script>

    </script>
</body>

</html>