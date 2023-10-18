<?php

include_once('./db.php');
session_start();

$user_id = $_SESSION['user']['id'];

$sql = "SELECT * FROM Project where user_id='$user_id'";
$result = $conn->query($sql);
?>

<div class="project-section">
    <div class="projects">

        <?php
        if ($result->num_rows > 0) {

            while ($project = $result->fetch_assoc()) {
                $title =  $project['title'];
                $subtitle = $project['subtitle'];
                $summary =  $project['summary'];
                $project_id = $project['id'];
                $thumbnail = substr($project['thumbnail'], 2);
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

                        <form action="../admin/project.php" method="post" class="edit-form">
                            <input type='hidden' name="project-id" value='<?php echo "$project_id"; ?>' />
                            <div class="column">
                                <div class="col-item">
                                    <input type="submit" value="edit" class="edit-project-btn">
                                </div>
                                <div class="col-item">
                                    <input type="submit" value="delete" name="delete" class="delete-project-btn">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

        <? }
        } ?>
    </div>
</div>

