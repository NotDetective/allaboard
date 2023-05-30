<?php
session_start();
require_once '../pages/conn.php';

$stmt = $conn->prepare("SELECT * FROM country");
$stmt->execute();
$country = $stmt->fetchAll();

$stmt = $conn->prepare("SELECT * FROM class");
$stmt->execute();
$class = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Aboard!</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/add-product.css">
    <link rel="shortcut icon" href="/#icon" type="image/x-icon">

</head>

<body>
    <!-- <?php include '../header.php'  ?> -->

    <form name="add-product" method="POST" action="pages/add-product.php" enctype="multipart/form-data">
        <?php $rand=rand(); $_SESSION['rand']=$rand;?>
        <input type="hidden" value="<?php echo $rand; ?>" name="randcheck"/>
    
        <!-- every thing in the form can be moved if needed -->
        <input type="text" name="product-name" placeholder="Product Name">

        <textarea cols="30" rows="10" name="product-description" placeholder="Product Description" placeholder="Product Description"></textarea>

        <input type="number" name="product-price" placeholder="Product Price">

        <input type="number" name="product-discount" placeholder="Product Discount">

        <input type="number" name="travel-time" placeholder="travel-time">

        <select name="class_options" id="class-options">
            <?php foreach ($class as $c) :  ?>

                <option value="<?php echo $c['id']; ?>"> <?php echo $c['class_name']; ?></option>

            <?php endforeach ?>
        </select>

        <select name="country_options" id="country-options">
            <?php foreach ($country as $land) :  ?>

                <option value="<?php echo $land['id']; ?>"> <?php echo $land['country_name']; ?></option>

            <?php endforeach ?>
        </select>

        <input type="date" name="departure-date" placeholder="Departure date">

        <input type="text" name="departure-time" placeholder="Departure Time">

        <input type="file" name="product-image" accept="image/png, image/jpeg, image/jpg, image/gif">

        <input type="submit" name="submit" value="Add Product">
    </form>

    <!-- <?php include '../footer.php' ?> -->
    <script src="main.js"></script>
</body>

</html>
<?php
echo $_SESSION['statusMsg'];
