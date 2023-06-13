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
    <link rel="stylesheet" href="../css/add-product.css">
    <link rel="shortcut icon" href="/#icon" type="image/x-icon">
</head>

<body>
    <!-- <?php include '../header.php'  ?> -->

    <form id="add-product-form" name="add-product" action="pages/add-product.php" method="POST" enctype="multipart/form-data">
    
        <!-- every thing in the form can be moved if needed -->

        <input add_product_input type="text" name="product-name" placeholder="Product Name" required>

        <textarea add_product_input cols="30" rows="10" name="product-description" placeholder="Product Description" placeholder="Product Description"></textarea required>

        <input add_product_input type="number" name="product-price" placeholder="Product Price" step="0.01" required>

        <input type="number" name="product-discount" placeholder="Product Discount" step="0.01" value="null">

        <input add_product_input type="number" name="travel-time" placeholder="travel-time" step="0.01" required>

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

        <input add_product_input type="date" name="departure-date" placeholder="Departure date" required>

        <input add_product_input type="time" name="departure-time" placeholder="Departure Time" required>

        <input add_product_input type="file" name="product-image" accept="image/png, image/jpeg, image/jpg, image/gif" required>

        <input type="submit" name="submit" value="Add Product" onclick="checkIfEmpty();">
    </form>


    <dialog id="dialog-add-product">
        <h1>please make sure that all the fields are filled in</h1>
        <button onclick="closeDialog();"><h1>OK</h1"></button>
    </dialog>
    <!-- <?php include '../footer.php' ?> -->
    <script src="../js/add-product.js"></script>
</body>

</html>
<?php
    if (isset($_SESSION['statusMsgAddProduct'])) {
        echo $_SESSION['statusMsgAddProduct'];
    }
    $_SESSION['statusMsgAddProduct'] = "";

