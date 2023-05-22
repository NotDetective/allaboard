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
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/account.css">
    <link rel="shortcut icon" href="/#icon" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>

<body>

    <!-- <?php include 'header.php'; ?> -->

    <form name="login" action="login-and-register-page.php" method="POST">

        <input name="emailLogin" type="email" placeholder="Enter email">

        <input passwordInput name="passwordLogin" type="password" placeholder="Enter password">

        <button name="loginSubmit" type="submit">Login</button>
    </form>

    <form id="register-from" name="register" action="login-and-register-page.php" method="POST">

        <input id="nameRegister" name="nameRegister" type="text" placeholder="Enter name">

        <input id="emailRegister" name="emailRegister" type="text" placeholder="Enter email">

        <input passwordInput onchange="passwordRequirersCheck(this.id)" id="passwordRegister" name="passwordRegister" type="password" placeholder="Enter password">
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

    $stmt->execute(['username' => $email, 'password' => $password]);
    $row = $stmt->fetch();

    $_SESSION['username'] = $email;

    if ($row['username'] == $email and $row['password'] == $password) {
        
    }

}

//isset($_POST['registerSubmit']) 
if(false){

    $name = $_POST['nameRegister'];
    $email = $_POST['emailRegister'];
    $password = $_POST['passwordRegister'];
    
    $data = [
        'name' => $name,
        'email' => $email,
        'password' => $password
    ];

    
    $sql = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";

    $stmt = $conn->prepare($sql);
    $stmt->execute($data);
}
