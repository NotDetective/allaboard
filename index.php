<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Aboard!</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="/#" type="image/x-icon">
</head>
<body>
    <?php include'header.php'; ?>
    <main>
        <?php
        echo"<div class='menu'>";
            for ($i=0; $i <= 4; $i++) { 
                echo "<div class='toprated'>
                            <h1>Top rated</h1>
                            <div></div>
                            <p></p>
                            <p></p>
                        </div>";
            }
            echo "</div>"  ;
            echo"<div class='menu'>";
            for ($i=0; $i <= 4; $i++) { 
                echo "<div class='toprated'>
                            <h1>Sales</h1>
                            <div></div>
                            <p></p>
                            <p></p>
                        </div>";
            }
            echo "</div>"  ;
        ?>
    </main>
    <?php include'footer.php'; ?>
</body>
</html>