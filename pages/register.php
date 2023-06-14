<?php

require_once "../pages/conn.php";

if(isset($_POST['registerSubmit']))
{
    $email = $_POST['emailRegister'];
    $password = $_POST['passwordRegister'];
    
    $data = [
        'email' => $email,
        'password' => $password
    ];

    
    $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";

    $stmt = $conn->prepare($sql);
    $stmt->execute($data);
    header('Location: ../login-page.php');
}
else{
    header('Location: ../index.php');
}