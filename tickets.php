<?php
session_start();
$id = $_GET['id'];

require_once "pages/conn.php";
$stmt = $conn->prepare("SELECT * FROM product WHERE product_id= :product_id");
$stmt->execute(['product_id' => $id]);
$product = $stmt->fetch();

$idCountry = $product['country_id'];

$stmt = $conn->prepare("SELECT * FROM country WHERE id = :id");
$stmt->execute(['id' => $idCountry]);
$country = $stmt->fetch();

$idClass = $product['class_id'];

$stmt = $conn->prepare("SELECT * FROM class WHERE id = :id");
$stmt->execute(['id' => $idClass]);
$class = $stmt->fetch();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Aboard!</title>
    <link rel="stylesheet" href="css/ticket.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="/#" type="image/x-icon">
</head>

<body>

    <?php include 'header.php'; ?>

    <main>
        <div class="flexBox">
            <div class="infoBox">
                <div class="nameBox">
                    <p><?php echo $product['name']; ?></p>
                </div>
                <p><?php echo $product['description']; ?></p>
                <p>travel time of <?php echo $product['travel_time']; ?> hours</p>
                <p>departure date of <?php echo $product['departure_date']; ?></p>
                <p>departure time of <?php echo $product['departure_time']; ?></p>
                <p>heading to <?php echo $country['country_name']; ?></p>
                <p>traveling in <?php echo $class['class_name']; ?></p>

            </div>
            <div class="infoBox2">
                <div class="imgContainer">
                    <img src="upload-product-images/<?php echo $product['image']; ?>" class="img" alt="Image" height="100%" width="100%">
                </div>
                <div class="otherInformation">
                        <form action= "pages/add-to-cart.php" method="post">
                            <input type="hidden" value="<?php echo $product['product_id']; ?>" name="id">
                            <button type="submit" name="submit" class="addCartButton">Add To card</button>
                        </form>
                        <form action="pages/add-favorites.php" method="post">
                            <input type="hidden" value="<?php echo $product['product_id']; ?>" name="id">
                            <button type="submit" name="submit" class="addFavButton">Add To Favorites</button>
                        </form>
                    <div class="priceBox">
                        <?php if ($product['discount'] == 0) : ?>
                            <p color="#FFFFFF" >€ <?php echo $product['price']; ?></p>
                        <?php else : 
                           $price = $product['price']; 
                           $price = $price*$product['discount'];    
                            
                        ?>
                            <p><font color=red>€ <?php echo $price; ?></font></p>
                            <p class="oldPrice">€ <?php echo $product['price']; ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php include 'footer.php'; ?>
</body>