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

    <?php include 'header.php'; ?>

    <main>
        <div class="login-and-register-flexBox">
            <div class="login-flexBox">
                <div class="login-title">login</div>
                <form name="login" action="pages/login.php" method="POST">
                    <input name="emailLogin" type="text" placeholder="Enter email">

                    <input id="passwordLogin" name="passwordLogin" type="password" placeholder="Enter password">
                    
                    <div class="checkbox">
                        <input type="checkbox" onclick="showPasswordLogin()"> Show Password
                    </div>

                    <button name="loginSubmit" type="submit">Login</button>
                </form>
                <li class="register-link">
                    <a href="register-page.php">Register</a>
                </li>
            </div>

    </div>

    </main>


    <?php include 'footer.php'; ?>
    <script src="js/account.js"></script>
    <script src="js/main.js"></script>
</body>

</html>