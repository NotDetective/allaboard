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
            <div class="register-flexBox">
            <div class="register-title">register</div>
              
                <form id="register-from" name="register" action="pages/register.php" method="POST" >
                  
                     <input id="emailRegister" name="emailRegister" type="email" placeholder="Enter email" require>

                     <input onchange="passwordRequirersCheck(this.id)" id="passwordRegister" name="passwordRegister" type="password" placeholder="Enter password" require>
                    <div>
                        <input type="checkbox" onclick="showPasswordRegister()"> Show Password
                    </div>

                    <button onclick="registerFunction()" id="registerSubmit" name="registerSubmit" type="submit">Register</button>
                </form>
            </div>

            <div class="password-requirements">
                    <div class="password-requirements-title">password requirements</div>
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
                        <p id="passwordRequirementsLength">Password 8 characters required</p>
                    </div>
            </div>
        </div> 

        </div>

    </main>

    <?php include 'footer.php'; ?>

    <dialog id="dialog-account-register">
        <h1>password does not meet requirements</h1>
        <button onclick="closeDialog('#dialog-account-register');"><h1>close</h1"></button>
    </dialog>

    <dialog id="dialog-account-login">
        <h1 id='login-error'></h1>
        <button onclick="closeDialog('#dialog-account-login');"><h1>close</h1"></button>
    </dialog>
  
    <script src="js/account.js"></script>
    <?php if(isset($_SESSION['error'])):?>

        <script>
            openDialogAndSetContent('#dialog-account-login', '#login-error' ,'<?php echo $_SESSION['error']; ?>');
        </script>
    
    <?php endif;  $_SESSION['error'] = null; ?>
</body>
</html>

