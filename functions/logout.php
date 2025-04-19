<?php
session_start();
$_SESSION = [];
// unset($_SESSION["user_name"]);
// unset($_SESSION["user_id"]);
header('Location: ../');
die();
?>