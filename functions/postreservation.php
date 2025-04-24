<?php
session_start();

if ($_POST['action'] == 'confirm') {
    require_once '../config/db.php';
    $db = new Database();
    $query = '
    INSERT INTO 
    reservation(user, roomNumber, checkin, checkout, numberGuests, amountPaid)
    VALUES (?,?,CAST(? AS DATE),CAST(? AS DATE),?,?)';
    $types = 'iissii';
    $params = [
        $_SESSION['user_id'],
        $_SESSION['room_choice']['roomNumber'],
        $_SESSION['room_choice']['in'],
        $_SESSION['room_choice']['out'],
        $_SESSION['room_choice']['guests'],
        $_SESSION['room_choice']['total']
    ];
    $_SESSION['reservation'] = $db->query($query, $types, $params);
} else {
    $_SESSION['reservation'] = 'cancelled';
}
header('Location: ../confirm.php');