<?php session_start(); ?>

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
        require 'components/searchbar.php';
        require 'functions/findrooms.php';
        find_rooms();
        foreach ($_SESSION['available_rooms'] as $room) {
            include 'components/card.php';
        }
        ?>
    </main>
    <script src="search.js"></script>
</body>

</html>