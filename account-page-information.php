<?php
session_start();
if (!isset($_SESSION['users-id'])) {
    header("location: index.php");
}

require_once 'pages/conn.php';

$id = $_SESSION['users-id'];

$stmt = $conn->prepare("SELECT * FROM personal_info WHERE user_id=:user_id");
$stmt->execute(['user_id' => $id]);
$data = $stmt->fetch();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Aboard!</title>
    <link rel="stylesheet" href="css/account-pages.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="/#icon" type="image/x-icon">
</head>

<body>
    <?php include 'header.php'; ?>
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
                <form action="pages/add-personal-info.php" name="add-personal-info" method="POST">
                    <div>
                        <input type="text" placeholder="First Name" name="first-name" <?php if (isset($data['first_name'])) : ?> value="<?php echo $data['first_name']; ?>"<?php endif;  ?> require>
                    </div>
                    <div>
                        <input type="text" placeholder="Last Name" name="last-name" <?php if (isset($data['last_name'])) : ?> value="<?php echo $data['last_name']; ?>"<?php endif;  ?>  require>
                    </div>
                    <div>
                        <input type="text" placeholder="Mobile Number" name="mobile-number" <?php if (isset($data['mobile_number'])) : ?> value="<?php echo $data['mobile_number']; ?>"<?php endif;  ?>  require>
                    </div>
                    <button type="submit" name="submit" class="save-button">
                        <p>save</p>
                    </button>
                </form>
            </div>

            <div class="profile-picture-container">
                <div class="profile-picture">
                    <?php if (isset($_SESSION['users-avatar'])) :  ?>
                        <img src="upload-user-images/<?php echo $_SESSION['users-avatar']; ?>" alt="custom user avatar">
                    <?php else : ?>
                        <img src="img/PFP-Placeholder.png" alt="empty user avatar">
                    <?php endif; ?>
                </div>
                <div class="change-profile-picture">
                   <form name="change-profile-picture" action="pages/add-profile.php" method="POST" enctype="multipart/form-data">
                    <input type="file" name="profile-picture" accept="image/png, image/jpeg, image/jpg, image/gif" value="/#">

                   <button type="submit" name="submit">save</button>
                   </form>
                </div>
            </div>
        </div>
        <div class="whitespaceBig"></div>
        <div class="whitespace"></div>
    </main>
    <?php include 'footer.php'; ?>

    <body>

</html>