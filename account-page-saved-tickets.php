<?php
    
    session_start();
    if(!isset($_SESSION['users-id'])){
        header("location: index.php");
    }

    require_once 'pages/conn.php';
    $user_id = $_SESSION['users-id'];
   
    $stmt = $conn->prepare("SELECT product.name, product.price, product.class_id, product.departure_date, product.product_id FROM saved_product INNER JOIN product WHERE saved_product.product_id = product.product_id AND saved_product.user_id = :user_id");
    $stmt->execute(['user_id'=>$user_id]);
    $tickets = $stmt->fetchAll();
?>
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
    <?php include 'header.php'; ?>
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
                <a href="pages/logout.php">
                    <p>logout</p>
                </a>
            </div>

            <div class="saved-tickets-container">
                <div class="saved-tickets-scroller">

                    <?php foreach($tickets as $row): 
                        
                        $stmt = $conn->prepare("SELECT * FROM class WHERE id =:id");
                        $stmt->execute(['id' => $row['class_id']]);
                        $class = $stmt->fetch();  
                        
                    ?>

                    <div class='saved-ticket'>
                        <div class='imgholder'>
                            <img src='img/<?php echo $class["class_image"];?>' alt='error404' class='img'>
                        </div>
                        <div class='ticketInfo'>
                            <p class='name'>name: <?php echo $row['name']; ?></p>
                            <p class='date'>date: <?php echo $row['departure_date']; ?></p>
                        </div>
                        <div>
                            <p class='class'>class: <?php echo $class['class_name']; ?></p>
                            <div class='priceContainer'>
                                <p>€<?php echo $row['price'] ?></p>
                                <a class='arrow-link' href='tickets.php?id=<?php echo $row['product_id']; ?>'>></a>
                            </div>
                        </div>
                    </div>
                    
                    <?php endforeach; ?>

                </div>
            </div>
            


        </div>
    </main>
    <?php include 'footer.php'; ?>

    <body>

</html>