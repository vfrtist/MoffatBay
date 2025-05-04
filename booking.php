<?php
session_start();
require 'config/db.php'; 

// Ensure the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php'); // Redirect to login page if the user is not logged in
    exit();
}

// Check if the activity is passed in the URL
if (isset($_GET['activity'])) {
    $activity = $_GET['activity'];

    // Ensure the activity is a valid option (optional validation)
    $valid_activities = ['whale-watching', 'scuba-diving', 'kayaking', 'hiking'];
    if (in_array($activity, $valid_activities)) {
        // Initialize the database connection
        $db = new Database();

        $userId = $_SESSION['user_id']; 
        $bookingTime = date('Y-m-d H:i:s');

        // SQL query to insert a new booking
        $query = "INSERT INTO bookings (activity, user_id, booking_time) VALUES (?, ?, ?)";
        $types = 'sis'; // 's' for string (activity), 'i' for integer (user_id), 's' for string (booking_time)
        $params = [$activity, $userId, $bookingTime];

        // Execute the query using the custom Database class
        $db->query($query, $types, $params);

        // Redirect to a confirmation page
        header("Location: booking_confirmation.php?activity=$activity");
        exit(); // Stop further execution after redirection
    } else {
        echo "Invalid activity.";
    }
} else {
    echo "No activity selected.";
}
?>