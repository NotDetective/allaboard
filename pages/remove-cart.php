<?php
if(isset($_POST['product_id'])) {

    require_once 'conn.php';

    $id = $_POST['product_id'];

    $stmt = $conn->prepare("DELETE FROM bookings WHERE product_id=:product_id");

    $stmt ->execute(['product_id' => $id]);

    header('Location: ../index.php');
}else{
    header('Location: ../index.php');
}