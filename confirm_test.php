<?php session_start() ?>
<!DOCTYPE html>
<!-- WIP -->
<html lang="en">

<head>
    <?php require 'components/head.php' ?>
</head>

<body>
    <?php
    $values = $_SESSION['available_rooms'][$_GET['typeName']];
    echo $_SESSION['user_name'];
    echo '<br>';
    echo $values['roomNumber'];
    echo '<br>';
    echo $values['typeID'];
    echo '<br>';
    echo $values['typeName'];
    echo '<br>';
    echo $values['dailyRate'];
    echo '<br>';
    echo $_GET['checkin'];
    echo '<br>';
    echo $_GET['checkout'];
    echo '<br>';
    echo $_GET['guests'];
    ?>
</body>