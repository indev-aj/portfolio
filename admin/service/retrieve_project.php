<?php

include_once('./db.php');
session_start();

$user_id = $_SESSION['user']['id'];

$sql = "SELECT * FROM Project where user_id='$user_id'";
$result = $conn->query($sql);
$user;
?>

<div class="project-section">
    <div class="projects">

        <?php
        if ($result->num_rows > 0) {

            while ($user = $result->fetch_assoc()) {
                $title =  $user['title'];
                $subtitle = $user['subtitle'];
                $summary =  $user['summary'];
                $thumbnail = substr($user['thumbnail'], 2);
                $thumbnail = "./" . $thumbnail;
                $thumbnail = str_replace(' ', '%20', $thumbnail);
        ?>
                <div class="card card-project">
                    <div class="project admin-project">
                        <div>
                            <div class="project-thumbnail">
                                <img src=<?= $thumbnail ?> alt="project image" loading="lazy">
                            </div>
                            <div class="project-title"><?= $title ?></div>
                            <div class="project-subtitle"><?= $subtitle ?></div>
                            <div class="project-summary"><?= $summary ?></div>
                        </div>

                        <form action="./retrieve_project.php" method="get" class="edit-form">
                            <div class="column">
                                <div class="col-item">
                                    <input type="button" value="edit" class="edit-project-btn">
                                </div>
                                <div class="col-item">
                                    <input type="button" value="delete" class="delete-project-btn">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

        <? }
        } ?>
    </div>
</div>