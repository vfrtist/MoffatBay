<?php

function find_rooms()
{
    require_once 'config/db.php';
    $db = new Database();
    /* 
    General events: 
        Get rooms based on date. (haven't solved yet for now pull all room types)
        Put those rooms into an array as a session variable by
        [typeName => [roomNumber, description, amenities, maxOccupancy, dailyRate ]]
        Second step is to read all rooms in $_SESSION['Available Rooms']
    */
    $query = '
    SELECT r.roomNumber, rt.typeID, rt.typeName, rt.description, rt.amenities, rt.maxOccupancy, rt.dailyRate
    FROM Room r
    JOIN RoomType rt ON r.roomType = rt.typeID
    WHERE r.roomNumber = (
        SELECT MIN(r2.roomNumber)
        FROM Room r2
        WHERE r2.roomType = r.roomType
            AND r2.roomNumber NOT IN (
                SELECT res.roomNumber
                FROM Reservation res
                WHERE NOT (
                    res.checkout <= ? OR
                    res.checkin >= ?
                )
            )
        )';
    // TODO sanitize dates in the event that they HAVEN'T been set by the form correctly.
    // Requires default values I think.
    $result = $db->query($query, 'ss', [$_GET['arrival'], $_GET['departure']]);
    $_SESSION['available_rooms'] = [];
    foreach ($result as $r) {
        $_SESSION['available_rooms'][$r['typeName']] = [
            'typeName' => $r['typeName'],
            'roomNumber' => $r['roomNumber'],
            'typeID' => $r['typeID'],
            'description' => $r['description'],
            'amenities' => $r['amenities'],
            'maxOccupancy' => $r['maxOccupancy'],
            'dailyRate' => $r['dailyRate']
        ];
    }
}
?>