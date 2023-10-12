<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Portfolio</title>

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Poppins" />
    <link rel="icon" type="image/png" href="./images/favicon.png">
</head>

<body>

    <div class="container">

        <?php
        include_once('./header.php');
        $username = "amrin";
        $sql = "SELECT * FROM User where username='$username'";
        $result = $conn->query($sql);

        $user;

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
        }

        $thumbnail = substr($user['thumbnail'], 2);
        ?>

        <!-- Body -->
        <div class="self-intro">
            <div class="potrait">
                <img src="<?php echo "./admin/" . $thumbnail ?>" alt="">
            </div>

            <div class="text">
                <div class="name">Amrin Jaffni</div>
                <div class="position">Backend developer and<br>translator</div>
                <div class="message">Hoping to build project for those in needs</div>
                <div class="socmed">
                    <a href="https://github.com/indev-aj" target="_blank"><img src="./icons/github.png" id="github-img" alt="github icon"></a>
                    <a href="https://www.linkedin.com/in/amrin-jaffni/" target="_blank"><img src="./icons/linkedin.png" alt="github icon"></a>
                </div>
            </div>
        </div>

        <div class="tech-stack">
            <div class="tech-stack-title">Tech Stack</div>
            <div class="tech-icons">
                <?php

                $user_id = $user['id'];
                $sql = "SELECT * FROM Skill where user_id='$user_id' ORDER BY FIELD(type, 'programming', 'framework', 'software', 'hardware', 'others')";
                $result = $conn->query($sql);
                $skill;

                if ($result->num_rows > 0) {

                    while ($skill = $result->fetch_assoc()) {
                        $icon = substr($skill['icon'], 2);
                        $icon = "admin" . $icon;
                        $icon = str_replace(' ', '%20', $icon);
                ?>

                        <div class="icon-box"><img src=<?= $icon ?> alt="html logo" title=<?= $skill['title'] ?>></div>
                <?php }
                } ?>
            </div>
        </div>

        <!-- Footer -->

    </div>

</body>

</html>