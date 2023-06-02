<?php

if (isset($_POST['loginSubmit']))
{
    $email = $_POST['emailLogin'];

    $password = $_POST['passwordLogin'];

    $stmt = $conn->prepare("SELECT email, password, role FROM users WHERE email=:email AND password=:password");

    $stmt->execute(['email' => $email, 'password' => $password]);
    $row = $stmt->fetch();

    if ($row['email'] == $email && $row['password'] == $password) {
        $_SESSION['users-name'] = $row['name'];
        $_SESSION['users-id'] = $row['id'];

        header('Location: ../index.php');
    }

}
else{
    header('Location: ../index.php');
}