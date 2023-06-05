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
                            <h2>Top rated</h2>
                            <div></div>
                            <p></p>
                            <p></p>
                        </div>";
            }
            echo "</div>"  ;
            echo"<div class='menu'>";
            for ($i=0; $i <= 4; $i++) { 
                echo "<div class='toprated'>
                            <h2>deals</h2>
                            <div></div>
                            <p></p>
                            <p></p>
                        </div>";
            }
            echo "</div>";
        ?>

            <div class="containerss">
                <div class="flexbox">
                    <div class="overlayss">
                        <div>test</div>
                        <div>test</div>
                        <div>test</div>
                        <div>test</div>
                        <div>test</div>
                    </div>
                </div>
                <img src="img/trainImage1.png" alt="error404" class="ssimg" id="slideshowimg">
            </div>

            <div class="containerTicket">
                <?php
                // maak de "for", een "foreach" statement.
                    for ($i=0; $i <= 19; $i++) { 
                        echo"<div class='ticket'>
                        
                                <div class='imgholder'>
                                    <img src='/#' alt='error404' class='img'>
                                </div>
                                <div class='ticketInfo'>
                                    <h1 class='name'>name</h1>
                                    <p class='description'>Lorem ipsum daolor sit amet, consectetur adipiscing elit. Pellentesque euismod accumsan hendrerit. Aliquam aliquet nisi sed rutrum elementum. Vivamus in.</p>
                                    <p class='location'>date / location</p>
                                    <p class='time'>time</p>
                                </div>
                                <div class='priceContainer'>
                                    <p class='price'>price</p>
                                    <div>
                                        <a href='/#'></a>
                                    </div>
                                </div>

                            </div>";
                    }
                ?>
            </div>

    </main>
    <?php include'footer.php'; ?>

    <script src="js/index.js"></script>
</body>
</html>