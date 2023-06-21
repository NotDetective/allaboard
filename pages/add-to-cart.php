<?php

session_start();
if (isset($_POST['submit'])) {
    require_once "conn.php";

    $user_id = $_SESSION['users-id'];
    $product_id = $_POST['id'];

    $data = [
        'user_id' => $user_id,
        'product_id' => $product_id,
    ];

    $stmt = $conn->prepare("SELECT * FROM bookings WHERE user_id =:user_id AND product_id = :product_id");
    $stmt->execute($data);
    $row = $stmt->fetch();

    if (!$row) {
        $sql = "INSERT INTO bookings (user_id, product_id) VALUES (:user_id, :product_id)";

        $stmt = $conn->prepare($sql);
        $stmt->execute($data);
    }
    var_dump($row);

    header("Location: ../tickets.php?id=$product_id");
}
else{
    header("Location: ../index.php");
}