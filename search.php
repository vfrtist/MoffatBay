<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require 'components/head.php' ?>
    <title>Find Rooms</title>
</head>

<body>
    <?php
    require 'components/simpleheader.php';
    ?>
    <main>
        <?php
        require 'functions/findrooms.php';
        foreach (find_rooms() as $room) {
            include 'components/card.php';
        }
        // if ($results->num_rows > 0) {
        //     // output data of each row
        //     while ($row = $results->fetch_assoc()) {
        //         include 'components/card.php';
        //     }
        // } else {
        //     echo "0 results";
        // }
        ?>
    </main>
</body>