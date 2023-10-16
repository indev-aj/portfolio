<?php

include_once('./db.php');
session_start();

$user_id = $_SESSION['user']['id'];

$sql = "SELECT * FROM Project where user_id='$user_id'";
$result = $conn->query($sql);
$user;

if ($result->num_rows > 0) {

    while ($user = $result->fetch_assoc()) {
        $title =  $user['title'];
        $subtitle = $user['subtitle'];
        $summary =  $user['summary'];
        $thumbnail = substr($user['thumbnail'], 2);
        $thumbnail = "./" . $thumbnail;
        $thumbnail = str_replace(' ', '%20', $thumbnail);
?>


        <div class="projects">
            <div class="card">
                <div class="project">
                    <div class="project-thumbnail">
                        <img src=<?= $thumbnail ?> alt="project image">
                    </div>
                    <div class="project-title"><?= $title ?></div>
                    <div class="project-subtitle"><?= $subtitle ?></div>
                    <div class="project-summary"><?= $summary ?></div>
                </div>
            </div>
        </div>

<? }
}
