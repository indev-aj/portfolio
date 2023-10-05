<?php require_once('./service/db.php'); ?>

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

        <!-- Navbar -->
        <div class="header-container">
            <div class="logo"><a href="./index.php">INDEV</a></div>
            <div class="navbar" style="font-size: 24px;">
                Login to gain access
            </div>

            <div class="hamburger" onclick="menu()" style="display: none;">
                <div class="bar"></div>
                <div class="bar"></div>
                <div class="bar"></div>
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
                    <a href="./register.php" style="color: white; text-decoration:none">Create an account</a>
                </form>
            </div>
        </div>
        
    </div>
    
    <script src="../script.js"></script>
</body>

</html>