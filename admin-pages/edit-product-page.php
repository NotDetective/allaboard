<?php

    require '../pages/conn.php';

    $id = (int)$_GET['id'];


    $stmt = $conn->prepare("SELECT * FROM product WHERE id=:id");

    $stmt->execute(['id' => $id]); 
    $row = $stmt->fetch();

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
    <link rel="shortcut icon" href="/#icon" type="image/x-icon">
</head>
<body>
<form id="add-product-form" name="add-product" action="pages/add-product.php" method="POST" enctype="multipart/form-data">
    
    <!-- every thing in the form can be moved if needed -->

    <input add_product_input type="text" name="product-name" placeholder="Product Name" value="<?php echo $row['name']; ?>" required>

    <textarea add_product_input cols="30" rows="10" name="product-description" placeholder="Product Description" placeholder="Product Description"><?php echo $row['description']; ?>   </textarea required>

    <input add_product_input type="number" name="product-price" placeholder="Product Price" step="0.01" value="<?php echo $row['price']; ?>"required>

    <input type="number" name="product-discount" placeholder="Product Discount" step="0.01" value="<?php echo $row['discount'] * 100; ?>" required>

    <input add_product_input type="number" name="travel-time" placeholder="travel-time" step="0.01" value="<?php echo $row['travel_time']; ?>" required>

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

    <input add_product_input type="date" name="departure-date" placeholder="Departure date" value="<?php echo $row['departure_date']; ?>" required>

    <input add_product_input type="time" name="departure-time" placeholder="Departure Time" value="<?php echo $row['departure_time']; ?>"required>

   
    <img src="../upload-product-images/<?php echo $row['image']; ?>" alt="uploaded image">

    <input add_product_input type="file" name="product-image" accept="image/png, image/jpeg, image/jpg, image/gif" required>

    <input type="submit" name="submit" value="Update Product" onclick="">
</form>
</body>
</html>