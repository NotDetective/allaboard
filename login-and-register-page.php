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

    <form name="login" action="pages/login.php" method="POST">
        <input name="emailLogin" type="text" placeholder="Enter email">

        <input id="passwordLogin" name="passwordLogin" type="password" placeholder="Enter password">
        <input type="checkbox" onclick="showPasswordLogin()"> Show Password

        <button name="loginSubmit" type="submit">Login</button>
    </form>

    <form id="register-from" name="register" action="pages/register.php" method="POST" >
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


    <dialog id="dialog-account-register">
        <h1>password does not meet requirements</h1>
        <button onclick="closeDialog('#dialog-account-register');"><h1>close</h1"></button>
    </dialog>
    <!-- <?php include 'footer.php'; ?> -->
    <script src="js/account.js"></script>
    <script src="js/main.js"></script>
</body>

</html>

