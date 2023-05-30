<?php
session_start();
require_once '../pages/conn.php';

if(isset($_POST["submit"]))
{
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

            if (isset($discount)) {
                $discount = $discount/100;
            }

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
            

            $sql = "INSERT INTO product (name, description, price ,discount, travel_time, class_id, country_id, departure_date, departure_time, image) 
            VALUES (:name, :description, :price ,:discount, :travel_time, :class_id, :country_id, :departure_date, :departure_time, :image )";

            try{
                $stmt = $conn->prepare($sql);

                $stmt->execute($data);
            }catch(Exception $e){
                echo $e->getMessage() . "</br>";
            }

            if(isset($sql)){

                $_SESSION['statusMsg'] = "The file ".$fileName. " has been uploaded successfully.";

            }else{

                $_SESSION['statusMsg'] = "File upload failed, please try again.";

            } 
        }else{

            $_SESSION['statusMsg'] = "Sorry, there was an error uploading your file.";
        }
    }else{

        $_SESSION['statusMsg'] = 'Sorry, only JPG, JPEG, PNG & GIF files are allowed to upload.';

    }
}else{

    header('Location: ../../index.php');
    
}