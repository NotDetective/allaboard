<header>
    <h1 class="titel"><a href="index.php">All Aboard!</a></h1>
    <nav>
        <ul>
            <li><a href="../index.php">Tickets</a></li>
            <li><a href="https://goo.gl/maps/hNx8xrwruZxwdjda6">Location</a></li>
            <li><a href="../about-us.php">About us</a></li>
        </ul>
    </nav>
    <div>
        <?php if(!isset($_SESSION['users-id'])): ?>
        <a href="login-page.php">
            <img src="../img/PFP-Placeholder.png" alt="empty user avatar">
        </a>
        <?php else: ?>
        <a href="account-page-information.php">
            <?php if(isset($_SESSION['users-avatar'])):  ?>
                <img src="../upload-user-images/<?php echo $_SESSION['users-avatar']; ?>" alt="custom user avatar">
            <?php else: ?> 
                <img src="../img/PFP-Placeholder.png" alt="empty user avatar">
            <?php endif; ?>
        </a>
        <?php endif; ?>
    </div>
</header>

