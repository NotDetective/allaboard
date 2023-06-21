<link rel="stylesheet" href="css/shopping-cart.css">

<div id="dropdown" class="dropbtn" onclick="openCart()">
    <img src="img/cart.png" alt="error404">
</div>

<dialog id="shoppingcart">
    <div>
        <?php

        $stmt = $conn->prepare("SELECT * FROM bookings WHERE user_id = :user_id AND bought = 0");

        $stmt->execute(['user_id' => $_SESSION['users-id']]);

        $cart = $stmt->fetchAll();

        ?>

        <?php foreach ($cart as $cart) :

            $stmt = $conn->prepare("SELECT * FROM product WHERE product_id =:product_id");

            $stmt->execute(['product_id' => $cart['product_id']]);

            $item = $stmt->fetch();
        ?>

            <div width="500px" height="100%">
                <h1>Name : <?php echo $item['name'] ?></h1>
                <?php if ($item['discount'] != 0) : ?>
                    <p>Price : € <?php echo $item['price'] * $item['discount'] ?></p>
                <?php else :  ?>
                    <p>Price : € <?php echo $item['price'] ?></p>
                <?php endif;  ?>
                <form action="pages/remove-cart.php" method="POST" name="remove-cart">
                    <button type="submit" name="remove-cart" class="closebtn">
                        <p>remove</p>
                    </button>
                    <input type="hidden" name="product_id" value="<?php echo $item['product_id'] ?>">
                </form>
            </div>

        <?php endforeach; ?>

        <button class="closebtn" onclick="closeCart()">
            <p>close cart</p>
        </button>
    </div>
</dialog>