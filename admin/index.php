<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>

    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="./style.css">
    <script src="./script.js"></script>
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Poppins" />
</head>

<body>

    <div class="container">

        <?php include_once('./header.php') ?>

        <div class="main-section">
            <div class="page-title">Login</div>
            <div class="card">
                <form action="" method="post">
                    <div class="input-username">
                        <label for="username">username</label>
                        <input type="text" name="username" id="username" placeholder="Username" required>
                    </div>
                    <div class="inpu-password">
                        <label for="password">password</label>
                        <input type="password" name="password" id="password" placeholder="Strong Password" required>
                    </div>
                    <input type="button" value="LOGIN" class="submit-btn" onclick="console.log('helo')">
                </form>
            </div>
        </div>

    </div>

</body>

</html>