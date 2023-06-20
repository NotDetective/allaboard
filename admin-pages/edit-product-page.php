<?php
session_start();
require '../pages/conn.php';

$id = (int)$_GET['id'];


$stmt = $conn->prepare("SELECT * FROM product WHERE product_id=:product_id");

$stmt->execute(['product_id' => $id]);
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

    <form id="add-product-form" name="add-product" action="edit-product-page.php?id=<?php echo $_GET['id']; ?>" method="POST" enctype="multipart/form-data">

        <!-- every thing in the form can be moved if needed -->

        <input add_product_input type="text" name="product-name" placeholder="Product Name" value="<?php echo $row['name']; ?>">

        <textarea add_product_input cols="30" rows="10" name="product-description" placeholder="Product Description" placeholder="Product Description"><?php echo $row['description']; ?></textarea>

        <input add_product_input type="number" name="product-price" placeholder="Product Price" step="0.01" value="<?php echo $row['price']; ?>">

        <input type="number" name="product-discount" placeholder="Product Discount" step="0.01" value="<?php echo $row['discount'] * 100; ?>">

        <input add_product_input type="number" name="travel-time" placeholder="travel-time" step="0.01" value="<?php echo $row['travel_time']; ?>">

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

        <input add_product_input type="date" name="departure-date" placeholder="Departure date" value="<?php echo $row['departure_date']; ?>">

        <input add_product_input type="time" name="departure-time" placeholder="Departure Time" value="<?php echo $row['departure_time']; ?>">


        <img src="../upload-product-images/<?php echo $row['image']; ?>" alt="uploaded image" width="auto" height="200px">

        <input add_product_input type="file" name="product-image" accept="image/png, image/jpeg, image/jpg, image/gif">

        <input type="submit" name="submit" value="Update Product">
    </form>
    <?php
    if (isset($_SESSION['statusMsgEditProduct'])) {
        echo $_SESSION['statusMsgEditProduct'];
    }
    $_SESSION['statusMsgEditProduct'] = "";
    ?>

</body>

</html>
<?php
if (isset($_POST["submit"])) {

    $newImage = false;

    if(!isset($_POST['product-image'])){
        $newImage = true;
    }

    if (isset($_FILES["product-image"]) || $newImage == true) {
        $targetDir = "../upload-product-images/";

        $fileName = basename($_FILES["product-image"]["name"]);

        $targetFilePath = $targetDir . $fileName;

        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');

        if (in_array($fileType, $allowTypes) || $newImage == true) {

            if (move_uploaded_file($_FILES["product-image"]["tmp_name"], $targetFilePath) || $newImage == true) {

                $id = $_GET['id'];

                $name = $_POST['product-name'];
                $description = $_POST['product-description'];
                $price = floatval($_POST['product-price']);
                $discount = floatval($_POST['product-discount']);
                $travel_time = intval($_POST['travel-time']);
                $class_id = intval($_POST['class_options']);
                $country_id = intval($_POST['country_options']);
                $departure_date = $_POST['departure-date'];
                $departure_time = $_POST['departure-time'];

                if (isset($discount)) {
                    $discount = $discount / 100;
                }

                $data = [
                    'name' => $name,
                    'description' => $description,
                    'price' => $price,
                    'discount' => $discount,
                    'travel_time' => $travel_time,
                    'country_id' => $country_id,
                    'departure_date' => $departure_date,
                    'departure_time' => $departure_time,
                    'class_id' => $class_id,
                    'image' => $fileName,
                    'product_id' => (int)$id
                ];


                $sql = "UPDATE product SET name=:name, description=:description, price=:price, discount=:discount, travel_time=:travel_time, 
                country_id=:country_id, departure_date=:departure_date, departure_time=:departure_time, class_id=:class_id, image=:image
                WHERE product_id=:product_id";


                $stmt = $conn->prepare($sql);

                var_dump($data);

                $stmt->execute($data);

                if (isset($sql)) {
                    header("Location: ../index.php");
                } else {

                    $_SESSION['statusMsgEditProduct'] = "File upload failed, please try again.";
                }
            } else {

                $_SESSION['statusMsgEditProduct'] = "Sorry, there was an error uploading your file.";
            }
        } else {

            $_SESSION['statusMsgEditProduct'] = 'Sorry, only JPG, JPEG, PNG & GIF files are allowed to upload.';
        }
    }
}
