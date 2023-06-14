<?php
session_start();
if (isset($_POST['submit'])) {
    $product_id = $_POST['id'];

    $data = [
        'product_id' => $idProduct,
    ];

    $sql = "INSERT INTO saved_product (user_id, product_id) VALUES (:user_id, :product_id)";

    $stmt = $conn->prepare($sql);
    $stmt->execute($data);
}
else{
    header("Location: ../index.php");
}