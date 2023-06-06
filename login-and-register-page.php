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
        <div class="login-and-register-title">
            login/register
        </div>
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
            </div>
            <div class="register-flexBox">
            <div class="register-title">register</div>
                <form id="register-from" name="register" action="pages/register.php" method="POST" >
                    <input id="emailRegister" name="emailRegister" type="email" placeholder="Enter email">

                    <input onchange="passwordRequirersCheck(this.id)" id="passwordRegister" name="passwordRegister" type="password" placeholder="Enter password">
                    <div>
                        <input type="checkbox" onclick="showPasswordRegister()"> Show Password
                    </div>

                    <button onclick="registerFunction()" id="registerSubmit" name="registerSubmit" type="submit">Register</button>
                </form>
            </div>

        </div>
        <div class="password-requirements-title">password requirements</div>
        <div class="password-requirements">
                <div>
                    <p id="passwordRequirementsUpercase">Contains upercase letter</p>
                </div>
                <div>
                    <p id="passwordRequirementsLowercase">Contains lowercase letter</p>
                </div>
                <div>
                    <p id="passwordRequirementsNumber">Contains number</p>
                </div>
                <div>
                    <p id="passwordRequirementsSpecialCharacter">Contains special character</p>
                </div>
                <div>
                    <p id="passwordRequirementsLength">Password length is at least 8 characters long</p>
                </div>
            </div>


    </main>


    <?php include 'footer.php'; ?>
    <script src="js/account.js"></script>
    <script src="js/main.js"></script>
</body>

</html>

