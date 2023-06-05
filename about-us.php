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
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis efficitur magna ac orci varius, sit amet
                sollicitudin mauris eleifend. Nullam vel enim ac arcu fringilla feugiat vitae ac risus. Fusce commodo,
                leo a eleifend lobortis, erat velit congue purus, eget sagittis ligula massa in leo. Mauris et augue a
                lectus vulputate accumsan. Sed varius euismod nulla, nec posuere nisi tempus non. Integer tristique
                aliquam tincidunt. In quis purus a tellus placerat elementum sed nec eros.</p>

            <p>Phasellus vehicula ligula quis tellus facilisis, non tincidunt ex rhoncus. Vivamus accumsan nisi id enim
                ullamcorper finibus. Nunc consequat mi in risus tincidunt, in faucibus felis auctor. Suspendisse
                potenti. Nam pulvinar est vitae justo aliquet, eget cursus sem laoreet. Donec malesuada ultricies mi,
                vel fringilla sapien bibendum eget.</p>
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