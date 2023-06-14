<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Aboard!</title>
    <link rel="stylesheet" href="css/account-pages.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="/#icon" type="image/x-icon">
</head>
<body>
    <?php include'header.php'; ?>
    <main>
        <div class="whitespace"></div>
        <div class="information-container">
            <div class="options-container">
                <a href="account-page-information.php">
                    <p>account Information</p>
                </a>
                <a href="account-page-saved-tickets.php">
                    <p>saved tickets</p>
                </a>
                <a href="account-page-purchased-tickets.php">
                    <p>purchased tickets</p>
                </a>
            </div>

            <div class="logout-button">
                <p>logout</p>
            </div>

            <div class="saved-tickets-container">
                
                <div class="saved-tickets-scroller">
                    <?php

                        for($i = 0; $i < 10; $i++){
                        echo "<div class='saved-ticket'>
                            <div class='imgholder'>
                                <img src='img/trainIcon1.png' alt='error404' class='img'>
                            </div>
                            <div class='ticketInfo'>
                                <p class='name'>name: placeholder</p>
                                <p class='date'>date: placeholder</p>
                            </div>
                            <div>
                                <p class='class'>class: placeholder</p>
                                <div class='priceContainer'>
                                    <p>Price</p>
                                    <a class='arrow-link' href='/page.html'>></a>
                                </div>
                            </div>
                        </div>";
                        }

                    ?>
                </div>

            </div>


        </div>
    </main>
    <?php include'footer.php'; ?>
<body>
</html>