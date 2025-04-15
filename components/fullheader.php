<header class="container horizontal">
    <?php require 'components/branding.php' ?>

    <div id="user" class="container horizontal">
        <?php
        if (isset($_SESSION["user_name"])) {
            echo "<span>Hi ", $_SESSION["user_name"], "</span>";
            ?>
            <form action='functions/logout.php'>
                <button id='logout' type='submit'>Log Out</button>
            </form>
            <?php
        } else { ?>
            <a id="join" href="register.php">Join</a>
            <a id="login" href="login.php">Log In</a>
        <?php } ?>
    </div>
</header>
<nav class="container horizontal">
    <a href="attractions.php">Attractions</a>
    <a href="search.php">Find Rooms</a>
    <a href="about.php">About Us</a>
    <a href="my_reservation.php">My Reservations</a>
    <a href="contact.php">Get in Touch</a>
</nav>