<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projects</title>

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Poppins" />
</head>

<body>

    <div class="container">

        <?php

        include_once('./header.php');
        $username = "amrin";
        $sql = "SELECT id FROM User WHERE username=?";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->bind_result($user_id);
        $stmt->fetch();
        $stmt->close();
        

        ?>

        <div class="project-section">
            <div class="project-section-title">Projects</div>
            <div class="projects">
                <?php

                $sql = "SELECT * FROM Project WHERE user_id='$user_id'";
                $result = $conn->query($sql);
                $user;

                if ($result->num_rows > 0) {

                    while($user = $result->fetch_assoc()) { 
                        $thumbnail = substr($user['thumbnail'], 2);
                        $thumbnail = "admin" . $thumbnail;
                        $thumbnail = str_replace(' ', '%20', $thumbnail);
                        ?>
                        <div class="project">
                        <div class="project-thumbnail">
                            <img src=<?= $thumbnail?> alt="project image">
                        </div>
                        <div class="project-title"><?= $user['title'] ?></div>
                        <div class="project-subtitle"><?= $user['subtitle'] ?></div>
                        <div class="project-summary"><?= $user['summary'] ?></div>
                    </div>
                    
                <?php }
                 } ?>
            </div>
        </div>
    </div>

    </div>
</body>

</html>
