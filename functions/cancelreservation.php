<?php
// use this function to cancel a reservation on a user's 'my-reservation' page
session_start();

function cancelReservation($reservationID, $userID)
{
    require_once '../config/db.php'; // get the database info
    $db = new Database(); // create a new database object

    $query = 'DELETE FROM Reservation WHERE reservationID = ? AND user = ?'; // create the statement
    $types = 'ii';
    $params = [$reservationID, $userID];

    return $db->query($query, $types, $params); // execute the query
}

// ensure the user is logged in, and post the reservation data
if (!isset($_SESSION['user_id']) || !isset($_POST['reservationID'])) {
    header('Location: /MoffatBay/my_reservation.php');
    exit();
}

// get the reservation data
$reservationID = intval($_POST['reservationID']);
$userID = $_SESSION['user_id'];

// remove the reservation from the database
$success = cancelReservation($reservationID, $userID);

// redirect the user back to "My Reservations" page
header('Location: /MoffatBay/my_reservation.php');
exit();