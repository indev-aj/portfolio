<?php

require_once('./service/db.php');

session_start();
if (isset($_SESSION["username"])) {
    header("Location: https://indevtechnology.com/portfolio/admin/bio.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>

    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Poppins" />
</head>

<body>

    <div class="container">

        <div class="header-container">
            <div class="logo"><a href="./bio.php">INDEV</a></div>
            <div class="navbar">
                <p style="font-size: 24px;">Login to gain acess</p>
                <div class="hamburger" onclick="menu()">
                    <div class="bar"></div>
                    <div class="bar"></div>
                    <div class="bar"></div>
                </div>
            </div>
        </div>

        <div class="main-section">
            <div class="page-title">Login</div>
            <div class="card">
                <form action="./service/login.php" method="post">
                    <div class="input-username">
                        <label for="username">username</label>
                        <input type="text" name="username" id="username" placeholder="Username" required>
                    </div>
                    <div class="input-password">
                        <label for="password">password</label>
                        <input type="password" name="password" id="password" placeholder="Strong Password" required>
                    </div>
                    <input type="submit" value="LOGIN" name="login" class="submit-btn">
                    <a href="./register.php" class="register-link" style="color: white; text-decoration:none">Create an account</a>
                </form>
            </div>
        </div>

    </div>

    <script src="../script.js"></script>
</body>

</html>