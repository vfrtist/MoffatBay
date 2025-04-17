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
    echo $values['typeID'];
    echo '<br>';
    echo $values['typeName'];
    echo '<br>';
    echo $values['dailyRate'];
    ?>
</body>