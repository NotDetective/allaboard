<?php
session_start();
require_once '../../pages/conn.php';

if(isset($_POST["submit"]))
{
    $targetDir = "../../upload-product-images/";

    $fileName = basename($_FILES["product-image"]["name"]);

    $targetFilePath = $targetDir . $fileName;

    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
    
    $allowTypes = array('jpg','png','jpeg','gif','pdf');

    if(in_array($fileType, $allowTypes)){
        
        if(move_uploaded_file($_FILES["product-image"]["tmp_name"], $targetFilePath)){
            
            $allowTypes = array('jpg','png','jpeg','gif');

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
                'image' => $fileName
            ];

            var_dump($data);
            echo "</br>";

            $sql = "INSERT INTO product (name, description, price, image, discount, travel_time, country_id, departure_date, departure_time, class_id) 
                    VALUES (:name, :description, :price, :image, :discount, :travel_time, :country_id, :departure_date, :departure_time, :class_id)";

            try {
                $stmt = $conn->prepare($sql);
                $stmt->execute($data);
            } catch (Exception $e) {
                echo $e->getMessage() . "</br>";
}
            if(isset($sql)){

                $_SESSION['statusMsg'] = "The file ".$fileName. " has been uploaded successfully.";
                header('Location: ../add-product-page.php');

            }else{

                $_SESSION['statusMsg'] = "File upload failed, please try again.";
                header('Location: ../add-product-page.php');

            } 
        }else{

            $_SESSION['statusMsg'] = "Sorry, there was an error uploading your file.";
            header('Location: ../add-product-page.php');
        }
    }else{

        $_SESSION['statusMsg'] = 'Sorry, only JPG, JPEG, PNG & GIF files are allowed to upload.';
        header('Location: ../add-product-page.php');

    }
}else{

    header('Location: ../../index.php');
    
}