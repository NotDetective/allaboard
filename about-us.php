<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Aboard!</title>
    <link rel="stylesheet" href="css/about-us.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="/#" type="image/x-icon">
</head>

<body>
    
    <?php include 'header.php'; ?>

    <main>
        <div class="intro">
            <h2>About Our Company</h2>
            <p>Embark on an unforgettable journey with All Aboard, the premier train company for your next adventure! Step into a world of elegance and luxury as you traverse breathtaking landscapes, from towering mountains to picturesque valleys.</p>
            <p>Experience impeccable service and comfort aboard our state-of-the-art trains, complete with plush seating, panoramic windows, and onboard amenities. Whether you're traveling solo, with family, or with friends, All Aboard guarantees a remarkable voyage tailored to your needs.</p>
            <p>Escape the ordinary and immerse yourself in the allure of train travel. Enjoy gourmet cuisine prepared by renowned chefs, unwind in spacious lounges, and indulge in exclusive activities while we whisk you away to your dream destination.</p>
            <p>Join us today and unlock a realm of possibilities. Discover new horizons, forge lasting memories, and let All Aboard transport you to a world of excitement and wonder. Don't miss out on our limited-time promotion—book your journey now and let the magic of All Aboard begin!</p>
        </div>
        <h1>Contact Us</h1>
        <p>Fill out the form below to get in touch with us.</p>

        <form action="#" method="post">
            <label for="name">name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="message">Message:</label>
            <textarea id="message" name="message" rows="5" required></textarea>

            <button type="submit">Send Message</button>
        </form>
    </main>

    <?php include 'footer.php'; ?>
    <script src="js/about-us.js"></script>
</body>

</html>