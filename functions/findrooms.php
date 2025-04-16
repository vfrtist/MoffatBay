<?php

function find_rooms()
{
    require_once 'config/db.php';
    $db = new Database();
    return $db->query('SELECT * FROM RoomType');
}
?>