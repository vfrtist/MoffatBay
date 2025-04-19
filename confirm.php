<?php
session_start();
// Save all posted values into session if they weren't yet.
if (!isset($_SESSION['room_choice'])) {
    $_SESSION['room_choice'] = $_SESSION['available_rooms'][$_POST['typeName']];
    $_SESSION['room_choice']['in'] = $_POST['checkin'];
    $_SESSION['room_choice']['out'] = $_POST['checkout'];
    $_SESSION['room_choice']['guests'] = $_POST['guests'];
    $startDate = new DateTime($_SESSION['room_choice']['in']);
    $endDate = new DateTime($_SESSION['room_choice']['out']);

    // Calculate length of stay and save total
    $numOfDays = $startDate->diff($endDate)->days;
    $_SESSION['room_choice']['total'] = $numOfDays * $_SESSION['room_choice']['dailyRate'];
}
// Check for a user to be logged in
if (!isset($_SESSION["user_id"])) {
    // Store a location to return upon logging in.
    $_SESSION['redirect'] = 'confirm.php';
    // Redirect to login.php
    header('Location: login.php');
    //For security in the event that client fails to honor location header
    die();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require 'components/head.php' ?>
    <link rel="stylesheet" href="user.css" />
    <title>Confirm your Reservation</title>
</head>

<body>
    <?php require 'components/simpleheader.php'; ?>

    <main id="grid">
        <div class="left container vertical">
            <?php if (isset($_SESSION['reservation'])) {
                if ($_SESSION['reservation'] == 'cancelled') { ?>
                    <h2>Reservation cancelled</h2>
                <?php } else { ?>
                    <h2>Your reservation has been confirmed</h2>
                <?php }
            } else { ?>
                <h2>Confirm your Reservation</h2>
            <?php } ?>
            <div>
                <div>Number of Guests: <span><?php echo $_SESSION['room_choice']['guests']; ?></span></div>
                <div>First Name: <span><?php echo $_SESSION['user_name']; ?></span></div>
                <div>Check In: <span><?php echo $_SESSION['room_choice']['in']; ?></span></div>
                <div>Check Out: <span><?php echo $_SESSION['room_choice']['out']; ?></span></div>
                <div>Daily Rate: <span><?php echo $_SESSION['room_choice']['dailyRate']; ?></span></div>
                <div>Total Price: <span><?php echo $_SESSION['room_choice']['total']; ?></span></div>
            </div>
        </div>
        <div class="right">
            <img src="<?php
            require 'config/roomimages.php';
            echo $roomImages[$_SESSION['room_choice']['typeName']];
            ?>" alt="A really nice hotel bedroom">
        </div>
        <!-- if a reservation has not been decided -->
        <?php if (!isset($_SESSION['reservation'])) { ?>
            <form id="reservation" method="POST" class="container horizontal" action="functions/postreservation.php">
                <button type="submit" class="cta2" name="action" value="cancel">Cancel Your Reservation</button>
                <button type="submit" class="cta1" name="action" value="confirm">Confirm Your Reservation</button>
            </form>
        <?php } else {
            // A reservation has been detected
            unset($_SESSION['reservation']);
        } ?>
    </main>
</body>