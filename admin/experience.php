<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin: Experience</title>

    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="./style.css">
    <script src="./script.js"></script>
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Poppins" />
</head>

<body>

    <div class="container">

        <?php include_once('./header.php') ?>

        <div class="main-section">
            <div class="page-title">Add New Experience</div>
            <div class="card">
                <form action="" method="post">
                    <div class="column">
                        <div class="col-item">
                            <label for="title">title</label>
                            <input type="text" name="title" id="title" placeholder="Give a title" required>
                        </div>
                        <div class="col-item">
                            <label for="company">company</label>
                            <input type="text" name="company" id="company" placeholder="eg. Company name" required>
                        </div>
                    </div>
                    <div class="column">
                        <div class="col-item">
                            <label for="date">Select Range</label>
                            <div class="column">
                                <input type="month" name="date-from" id="date-from">
                                <input type="month" name="date-to" id="date-to">
                            </div>
                        </div>
                        <div class="col-item">
                            <label for="work-type">Type</label>
                            <select name="work-type" id="work-type" class="skill-dropdown" required>
                                <option value="fulltime">Full-time</option>
                                <option value="parttime">Part-time</option>
                                <option value="freelance">Freelance</option>
                            </select>
                        </div>
                    </div>

                    <!-- Task Content -->

                    <div class="task-container">
                        <div class="input-task-container">
                            <label for="input-task">Task</label>
                            <input type="text" name="input-task" id="input-task" style="display: none">
                            <div contenteditable="true" class="input-task" data-placeholder="Enter text here"></div>
                            <input type="button" value="Add Task" name="add-task" class="add-task-btn">
                        </div>
                        <div class="delete-btn">
                            <img src="../icons/cross.png" alt="">
                        </div>
                    </div>

                    <input type="submit" value="submit" name='submit' class="submit-btn" onclick="getSummary()">
                </form>
            </div>
        </div>

    </div>

    <script>
    </script>
</body>

</html>