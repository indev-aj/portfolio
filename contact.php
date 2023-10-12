<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$vendor = './vendor/autoload.php';
include('./admin/service/db.php');
require_once realpath($vendor);

require './vendor/phpmailer/phpmailer/src/PHPMailer.php';
require './vendor/phpmailer/phpmailer/src/Exception.php';
require './vendor/phpmailer/phpmailer/src/SMTP.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . "/admin/service");
$dotenv->load();

if (isset($_POST['submit'])) {
    $sender_email = !empty($_POST["email"]) ? $conn->real_escape_string($_POST['email']) : "";
    $sender_name = !empty($_POST["name"]) ? $conn->real_escape_string($_POST['name']) : "";
    $subject = !empty($_POST["subject"]) ? $conn->real_escape_string($_POST['subject']) : "";
    $message = !empty($_POST["input-summary"]) ? $conn->real_escape_string($_POST['input-summary']) : "";

    $mail = new PHPMailer();

    try {
        $mail->isSMTP();
        $mail->Host = 'mail.indevtechnology.com';  // SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = $_ENV['SERVER_EMAIL'];
        $mail->Password = $_ENV['DB_PASSWORD'];
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        $mail->setFrom($sender_email, $sender_name);
        $mail->addAddress($_ENV['SERVER_EMAIL']);
        $mail->Subject = $subject;
        $mail->Body = $message;

        $mail->send();
    } catch (Exception $e) {
        echo 'Email sending failed: ' . $mail->ErrorInfo;
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Poppins" />
</head>

<body>

    <div class="container">

        <?php include_once('header.php') ?>
        <div class="main-section">
            <div class="page-title">
                Contact Form
            </div>
            <div class="card">
                <form action="" method="post">
                    <div class="column">
                        <div class="col-item">
                            <div class="input-name">
                                <label for="name">name</label>
                                <input type="text" name="name" id="name" placeholder="name" required>
                            </div>
                        </div>
                        <div class="col-item">
                            <div class="input-email">
                                <label for="email">email</label>
                                <input type="email" name="email" id="email" placeholder="org@example.com" required>
                            </div>
                        </div>
                    </div>
                    <div class="input-subject">
                        <label for="subject">subject</label>
                        <input type="text" name="subject" id="subject" placeholder="subject" required>
                    </div>

                    <label for="input-summary">summary</label>
                    <input type="text" name="input-summary" id="input-summary" style="display: none">
                    <div contenteditable="true" class="input-summary" data-placeholder="Enter text here"><?php echo $user['summary']; ?></div>

                    <input type="submit" value="Submit" name="submit" class="submit-btn" onclick="getSummary()">
                </form>
            </div>
        </div>
    </div>
</body>

</html>