<?php
session_start();
require_once 'pages/conn.php';

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
    <!-- <?php include 'header.php'  ?> -->

    <form name="add-product" method="POST" action="add-product-page.php" enctype="multipart/form-data">
        <!-- every thing in the form can be moved if needed -->
        <input type="text" name="product-name" placeholder="Product Name">

        <textarea cols="30" rows="10" name="product-description" placeholder="Product Description" placeholder="Product Description"></textarea>

        <input type="number" name="product-price" placeholder="Product Price">

        <input type="number" name="product-discount" placeholder="Product Discount">

        <input type="text" name="travel-time" placeholder="travel-time">

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

    <!-- <?php include 'footer.php' ?> -->
    <script src="main.js"></script>
</body>

</html>
<?php

if(isset($_POST["submit"])){

    $targetDir = "upload-product-images/";

    $fileName = basename($_FILES["product-image"]["name"]);

    $targetFilePath = $targetDir . $fileName;

    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
    
    $allowTypes = array('jpg','png','jpeg','gif','pdf');

    if(in_array($fileType, $allowTypes)){
        
        if(move_uploaded_file($_FILES["product-image"]["tmp_name"], $targetFilePath)){
            
            $allowTypes = array('jpg','png','jpeg','gif');

            $name = $_POST['product-name'];

            $discription = $_POST['product-description'];

            $price = $_POST['product-price'];

            $discount = $_POST['product-discount'];

            $travel_time = $_POST['travel-time'];

            $class_options = $_POST['class_options'];

            $country_options = $_POST['country_options'];

            $departure_date = $_POST['departure-date'];

            $departure_time = $_POST['departure-time'];

            $data = [
                'name' => $name,
                'discription' => $discription,
                'price' => $price,
                'discount' => $discount,
                'travel_time' => $travel_time,
                'class_options' => $class_options,
                'country_options' => $country_options,
                'departure_date' => $departure_date,
                'departure_time' => $departure_time,
                'image' => $fileName
            ];
            

            $sql = "INSERT INTO product (name, description, price ,discount, travel_time, class_options, country_options, departure_date, departure_time, image) 
            VALUES (:name, :description, :price ,:discount, :travel_time, :class_options, :country_options, :departure_date, :departure_time, :image )";

            try{
                $stmt = $conn->prepare($sql);

                $stmt->execute($data);
            }catch(Exception $e){
                echo $e->getMessage() . "</br>";
            }

            if(isset($sql)){

                $statusMsg = "The file ".$fileName. " has been uploaded successfully.";

            }else{

                $statusMsg = "File upload failed, please try again.";

            } 
        }else{

            $statusMsg = "Sorry, there was an error uploading your file.";
        }
    }else{

        $statusMsg = 'Sorry, only JPG, JPEG, PNG & GIF files are allowed to upload.';

    }
}else{

    $statusMsg = 'Please select a file to upload.';

}

// echo $statusMsg;
