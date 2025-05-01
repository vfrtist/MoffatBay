<?php
session_start();
if (isset($_GET['activity'])) {
    $activity = $_GET['activity'];
    echo "<h1>Your booking for $activity has been confirmed!</h1>";
    
} else {
    echo "No booking information available.";
}
?>