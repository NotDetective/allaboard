<?php

session_start();
require "../pages/conn.php";

if (isset($_POST['loginSubmit']))
{
    $email = $_POST['emailLogin'];

    $password = $_POST['passwordLogin'];

    try {
        $stmt = $conn->prepare("SELECT email, password, role FROM users WHERE email=:email AND password=:password");

        $stmt->execute(['email' => $email, 'password' => $password]);
        $row = $stmt->fetch();
    
        if(isset($row['role'])){
            if ($row['email'] == $email && $row['password'] == $password) {
                $_SESSION['users-name'] = $row['name'];
                $_SESSION['users-id'] = $row['id'];
                $_SESSION['users-role'] = $row['role'];
        
                header('Location: ../index.php');
            }
        }else{
            $_SESSION['error'] = "password or email is incorrect";
            header('Location: ../login-and-register-page.php');
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
        $_SESSION['error'] = $e->getMessage();
        header('Location: ../login-and-register-page.php');
    }

}
else{
    header('Location: ../index.php');
}