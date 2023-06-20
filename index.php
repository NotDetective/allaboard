<?php
session_start();

if (!isset($_SESSION['users-role'])) {
    $_SESSION['users-role'] = null;
}

$admin = 1;

require_once 'pages/conn.php';

if (isset($_GET['searchName']) && $_GET['name'] != null) {

    $name = $_GET['name'];

    $stmt = $conn->prepare("SELECT * FROM product WHERE name=:name");

    $stmt->execute(['name' => $name]);

    $row = $stmt->fetchAll();
} elseif (isset($_GET['searchDate'])) {

    $starting_date = $_GET['starting-date'];

    $ending_date = $_GET['ending-date'];


    $stmt = $conn->prepare("SELECT * FROM product WHERE departure_date BETWEEN :starting_date AND :ending_date");

    $stmt->execute([':starting_date' => $starting_date, ':ending_date' => $ending_date]);

    $row = $stmt->fetchAll();
} elseif (isset($_GET['searchPrice'])) {

    $starting_price = (float)$_GET['starting-price'];
    $max_price = (float)$_GET['max-price'];

    $stmt = $conn->prepare("SELECT * FROM product WHERE price BETWEEN :starting_price AND :max_price");
    $stmt->execute([':starting_price' => $starting_price, ':max_price' => $max_price]);

    $row = $stmt->fetchAll();
} else {

    $stmt = $conn->prepare("SELECT * FROM product");

    $stmt->execute();

    $row = $stmt->fetchAll();
}

if (!isset($row)) {
    $row = null;
}

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
    <link rel="shortcut icon" href="/#icon" type="image/x-icon">
</head>

<body>
    <?php include 'header.php'; ?>
    <main>
        <div class="containerss">
            <div class="flexbox">
                <div class="overlayss">

                    <div>
                        <!-- search bar -->
                        <form action="index.php" id="searchNameForm">
                            <input id="inputNameSearch" type="text" name="name" placeholder="enter name" <?php if (isset($_GET['name'])) : ?> value="<?php echo $_GET['name']; ?>" <?php endif; ?> require>

                            <button name="searchName" value="true">search</button>
                        </form>
                    </div>

                    <div class="dates-flexbox">
                        <!-- dates -->
                        <form action="index.php">
                            <input type="date" name="starting-date" placeholder="enter starting date" <?php if (isset($_GET['starting-date'])) : ?> value="<?php echo $_GET['starting-date']; ?>" <?php endif; ?> require>

                            <input type="date" name="ending-date" placeholder="enter ending date" <?php if (isset($_GET['ending-date'])) : ?> value="<?php echo $_GET['ending-date']; ?>" <?php endif; ?> require>

                            <button type="submit" name="searchDate" value="true">search</button>
                        </form>
                    </div>

                    <div>
                        <!-- prices -->
                        <form action="index.php">
                            <input type="number" name="starting-price" placeholder="enter starting price" <?php if (isset($_GET['starting-price'])) : ?> value="<?php echo $_GET['starting-price']; ?>" <?php endif; ?> require>

                            <input type="number" name="max-price" placeholder="enter max price" <?php if (isset($_GET['max-price'])) : ?> value="<?php echo $_GET['max-price']; ?>" <?php endif; ?> require>

                            <button type="submit" name="searchPrice" value="true">search</button>
                        </form>
                    </div>

                    <button onclick="location.href='index.php'">clear search</button>

                </div>
            </div>
            <img src="img/trainImage1.png" alt="error404" class="ssimg" id="slideshowimg">
        </div>

        <div class="containerTicket">
        <div class="addTicketButtons">     
            <?php if ($_SESSION['users-role'] == $admin) : ?>
                <button onclick="location.href='admin-pages/add-product-page.php'">
                    <h1> Add Ticket </h1>
                </button>
            <?php endif; ?>
        </div>   

            <div class="ticketPlaceholder"></div>

            <?php if ($row == null) : ?>

                <h1>No results found</h1>

            <?php else : ?>

                <?php foreach ($row as $row) : ?>
                    <div class='ticket'>

                        <div class='imgholder'>
                            <img src='upload-product-images/<?php echo $row['image']; ?>' width='100%' height='100%' id='img' alt='error404' class='img'>
                        </div>
                        <div class='ticketInfo'>
                            <h1 class='name'> <?php echo $row['name']; ?> </h1>
                            <p class='description'><?php echo $row['description']; ?></p>
                            <p class='location'> <?php echo $row['departure_date']; ?> </p>
                            <p class='time'> <?php echo $row['departure_time']; ?> </p>
                        </div>
                        <div class='priceContainer'>
                            <?php if ($_SESSION['users-role'] == $admin) : ?>
                                <a href="admin-pages/edit-product-page.php?id=<?php echo $row['product_id'] ?>">
                                    <img src="img/edit-icon.png" alt="edit icon">
                                </a>
                            <?php endif; ?>
                            <p> € <?php echo $row['price']; ?></p>
                            <a class='arrow-link' href='tickets.php?id=<?php echo $row['product_id'] ?>'> > </a>
                        </div>
                    </div>
                <?php endforeach; ?>

            <?php endif; ?>

            <div class="ticketPlaceholder"></div>
        </div>

    </main>
    <?php include 'footer.php'; ?>

    <script src="js/index.js"></script>
</body>

</html>