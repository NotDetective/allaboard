<?php
    session_start();
    require_once 'pages/conn.php';
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Aboard!</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/account.css">
    <link rel="shortcut icon" href="/#icon" type="image/x-icon">
</head>

<body>

    <!-- <?php include 'header.php'; ?> -->

    <form name="login" action="login-and-register-page.php" method="POST">

        <input name="emailLogin" type="text" placeholder="Enter email">

        <input id="passwordLogin" name="passwordLogin" type="password" placeholder="Enter password">
        <input type="checkbox" onclick="showPasswordLogin()"> Show Password

        <button name="loginSubmit" type="submit">Login</button>
    </form>

    <form id="register-from" name="register" action="login-and-register-page.php" method="POST" >

        <input id="emailRegister" name="emailRegister" type="email" placeholder="Enter email">

        <input onchange="passwordRequirersCheck(this.id)" id="passwordRegister" name="passwordRegister" type="password" placeholder="Enter password">
        <input type="checkbox" onclick="showPasswordRegister()"> Show Password

        <button onclick="registerFunction()" id="registerSubmit" name="registerSubmit" type="submit">Register</button>
    </form>

    <div>
        <p id="passwordRequirementsUpercase">Contains upercase letter</p>
        <p id="passwordRequirementsLowercase">Contains lowercase letter</p>
        <p id="passwordRequirementsNumber">Contains number</p>
        <p id="passwordRequirementsSpecialCharacter">Contains special character</p>
        <p id="passwordRequirementsLength">Password length is at least 8 characters long</p>
    </div>


    <!-- <?php include 'footer.php'; ?> -->
    <script src="js/account.js"></script>
    <script src="js/main.js"></script>
</body>

</html>
<?php

if (isset($_POST['loginSubmit'])) {
    $email = $_POST['emailLogin'];

    $password = $_POST['passwordLogin'];

    $stmt = $conn->prepare("SELECT email, password, role FROM users WHERE email=:email AND password=:password");

    $stmt->execute(['email' => $email, 'password' => $password]);
    $row = $stmt->fetch();

    if ($row['email'] == $email && $row['password'] == $password) {
        $_SESSION['users-name'] = $row['name'];
        $_SESSION['users-id'] = $row['id'];

        header('Location: index.php');
    }

}

if(isset($_POST['registerSubmit']) ){

    $email = $_POST['emailRegister'];
    $password = $_POST['passwordRegister'];
    
    $data = [
        'email' => $email,
        'password' => $password
    ];

    
    $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";

    $stmt = $conn->prepare($sql);
    $stmt->execute($data);
}
