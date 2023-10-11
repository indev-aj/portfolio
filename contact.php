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