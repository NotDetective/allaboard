<?php

if (isset($_POST['submit'])) {

    require_once 'conn.php';

    session_start();

    $id = $_SESSION['users-id'];

    $First_Name = $_POST['first-name'];

    $Last_Name = $_POST['last-name'];

    $Mobile_Number = $_POST['mobile-number'];

    $stmt = $conn->prepare("SELECT * FROM personal_info WHERE user_id=:user_id");
    $stmt->execute(['user_id' => $id]);
    $check = $stmt->fetch();

    var_dump($check);

    if ($check) {
        
        $data = [
            'first_name' => $First_Name,
            'last_name' => $Last_Name,
            'mobile_number' => $Mobile_Number,
        ];

        $sql = "UPDATE product SET first_name=:first_name, last_name=:last_name, mobile_number=:mobile_number WHERE user_id=:user_id";
        
        $stmt = $conn->prepare($sql);

        $stmt->execute($data);

    } else {

        $data = [
            'first_name' => $First_Name,
            'last_name' => $Last_Name,
            'mobile_number' => $Mobile_Number,
            'user_id' => $id
        ];

        $sql = "INSERT INTO personal_info (first_name, last_name, mobile_number, user_id)  
        VALUES (:first_name, :last_name, :mobile_number, :user_id)";

        try {
            $stmt = $conn->prepare($sql);
            $stmt->execute($data);
        } catch (Exception $e) {
            echo $e->getMessage() . "</br>";
        }
    }
} else {
    header("Location: ../index.php");
}
