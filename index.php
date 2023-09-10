<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Portfolio</title>

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Poppins" />
</head>
<body>
    
<div class="container">

    <?php include_once('./header.php')   ?>

    <!-- Body -->
    <div class="self-intro">
        <div class="potrait">
            <img src="./images/potrait.jpg" alt="">
        </div>
        
        <div class="text">
            <div class="name">Amrin Jaffni</div>
            <div class="position">Backend developer and<br>translator</div>
            <div class="message">Hoping to build project for those in needs</div>
            <div class="socmed">
                <a href="https://github.com/indev-aj" target="_blank"><img src="./icons/github.png" alt="github icon"></a>
                <a href="https://www.linkedin.com/in/amrin-jaffni/" target="_blank"><img src="./icons/linkedin.png" alt="github icon"></a>
            </div>
        </div>
    </div>

    <div class="tech-stack">
        <div class="tech-stack-title">Tech Stack</div>
        <div class="tech-icons">
            <div class="icon-box"><img src="./icons/tech/html-5.png" alt="html logo" title="HTML"></div>
            <div class="icon-box"><img src="./icons/tech/css-3.png" alt="css logo" title="CSS"></div>
            <div class="icon-box"><img src="./icons/tech/javascript.jpg" alt="javascript logo" title="Javascript"></div>
            <div class="icon-box"><img src="./icons/tech/php.png" alt="php logo" title="PHP"></div>
            <div class="icon-box"><img src="./icons/tech/mysql.png" alt="mysql logo" title="MySQL"></div>
            <div class="icon-box"><img src="./icons/tech/python.png" alt="python logo" title="Python"></div>
            <div class="icon-box"><img src="./icons/tech/django.png" alt="django logo" title="Django"></div>
            <div class="icon-box"><img src="./icons/tech/flutter.png" alt="flutter logo" title="Flutter"></div>
            <div class="icon-box"><img src="./icons/tech/office.png" alt="office logo" title="MS Office"></div>
            <div class="icon-box"><img src="./icons/tech/vscode.png" alt="vscode logo" title="VS Code"></div>
           
        </div>
    </div>

    <!-- Footer -->
</div>

</body>
</html>