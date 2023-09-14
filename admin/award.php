<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin: Award</title>

    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="./style.css">
    <script src="./script.js"></script>
    
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Poppins" />
</head>

<body>

    <div class="container">

        <?php include_once('./header.php') ?>

        <div class="main-section">
            <div class="page-title">Add New Award</div>
            <div class="card">
                <form action="" method="post">
                    <div class="column">
                        <div class="col-item">
                            <label for="title">title</label>
                            <input type="text" name="title" id="title" placeholder="Give a title" required>
                        </div>
                        <div class="col-item">
                            <label for="year">year</label>
                            <input type="text" name="year" id="year" placeholder="eg. 2019" required>
                        </div>
                    </div>
                    <label for="input-summary">summary</label>
                    <input type="text" name="input-summary" id="input-summary" style="display: none">
                    <div contenteditable="true" class="input-summary" data-placeholder="Enter text here"></div>

                    <input type="button" value="SUBMIT" class="submit-btn" onclick="">
                </form>
            </div>
        </div>

    </div>

</body>

</html>