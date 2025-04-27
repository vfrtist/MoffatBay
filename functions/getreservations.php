<?php
// utilized code from findrooms.php
// original author for that file is vfrtist

/**
 * Get the registered user's current reservations
 */
function get_reservations($userID) {
    require_once 'config/db.php'; // get the database info
    $db = new Database(); // create a new database object

    // make the query
    $query = '
        SELECT r.reservationID, r.roomNumber, r.checkin, r.checkout, r.numberGuests, r.amountPaid,
               rt.typeName, rt.dailyRate
        FROM Reservation r
        JOIN Room rm ON r.roomNumber = rm.roomNumber
        JOIN RoomType rt ON rm.roomType = rt.typeID
        WHERE r.user = ?
        ORDER BY r.checkin DESC
    ';

    $types = 'i';
    $params = [$userID];

    $reservations = $db->query($query, $types, $params); // send the query with the types and parameters to look for

    return $reservations;
}






