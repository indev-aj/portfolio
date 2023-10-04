<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Register</title>

    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="./style.css">
    <script src="./script.js"></script>
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
            <div class="page-title">Register</div>
            <div class="card">
                <form action="./service/register.php" method="post">
                    <div class="input-username">
                        <label for="username">username</label>
                        <input type="text" name="username" id="username" placeholder="Username" required>
                    </div>
                    <div class="input-password">
                        <label for="password">password</label>
                        <input type="password" name="password" id="password" placeholder="Strong Password" required>
                    </div>
                    <div class="input-username">
                        <label for="email">email</label>
                        <input type="email" name="email" id="email" placeholder="email@org.com" required>
                    </div>
                    <div class="input-username">
                        <label for="name">name</label>
                        <input type="text" name="name" id="name" placeholder="John Doe" required>
                    </div>
                    <div class="input-username">
                        <label for="phone">phone</label>
                        <input type="text" name="phone" id="phone" placeholder="+60xxxxxxxxx" required>
                    </div>
                    <input type="submit" value="REGISTER" name="register" class="submit-btn">
                    <a href="./index.php" style="color: white;">Login</a>
                </form>
            </div>
        </div>

    </div>

</body>

</html>