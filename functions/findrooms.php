<?php
$stmt = $conn->prepare('SELECT * FROM RoomType');
$stmt->execute();
$results = $stmt->get_result();
?>