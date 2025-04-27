<?php // start the session
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require 'components/head.php' ?>
    <title>My Reservations</title>
</head>

<body>
<?php
require 'components/fullheader.php';
require 'functions/getreservations.php';

// ensure the user has been logged in to use this feature, if not: the user is sent to login page
if (!isset($_SESSION['user_id'])) {
    // save the page location to redirect the user to see their reservations upon logging in
    $_SESSION['redirect'] = 'my_reservation.php';

    header("Location: login.php");
    die();
}

// get the user's reservations
$userID = $_SESSION['user_id'];
$reservations = get_reservations($userID);
?>

<main>
    <h1 style="text-align: center;">My Reservations</h1>

    <?php if (empty($reservations)) : ?>
        <div style="text-align: center;">You have no reservations made yet!</div>
    <?php else : ?>
        <div>
            <?php
            foreach ($reservations as $reservation) {
                // showcase the reservation card
                $res = $reservation; // the card as the reservation
                include 'components/reservationcard.php';
            }
            ?>
        </div>
    <?php endif; ?>
</main>

</body>

</html>

