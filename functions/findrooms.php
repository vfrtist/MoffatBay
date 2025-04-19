<?php

function find_rooms($in, $out)
{
    require_once 'config/db.php';
    $db = new Database();
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
    $types = 'ss';
    $params = [$in, $out];
    $result = $db->query($query, $types, $params);
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