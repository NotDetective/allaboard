<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Aboard!</title>
    <link rel="stylesheet" href="css/account-info-pages.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="/#icon" type="image/x-icon">
</head>
<body>
    <?php include'header.php'; ?>
    <main>
        <div class="whitespace"></div>
        <div class="information-container">
            <div class="options-container">
                <a href="account-page-information.php">
                    <p>account Information</p>
                </a>
                <a href="account-page-saved-tickets.php">
                    <p>saved tickets</p>
                </a>
                <a href="account-page-purchased-tickets.php">
                    <p>purchased tickets</p>
                </a>
            </div>
            <div class="account-information-container">
                <div>
                    <p>username: placeholder</p>
                </div>
                <div>
                    <p>email: placeholder</p>
                </div>
                <div>
                    <p>password: placeholder</p>
                </div>
            </div>
            <div class="profile-picture-container">
                <div class="profile-picture">
                    <img src="/#" alt="error404">
                </div>
                <div class="change-profile-picture">
                    <p>change profile picture</p>
                </div>
            </div>
        </div>
        <div class="whitespaceBig"></div>
        <div class="other-container">
            <div class="logout-button">
                    <p>logout</p>
            </div> 
        </div>
        <div class="whitespace"></div>
    </main>
    <?php include'footer.php'; ?>
<body>
</html>