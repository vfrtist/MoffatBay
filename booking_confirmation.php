<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Booking Confirmation</title>
    <link rel="stylesheet" href="attractions.css"> 
</head>
<body>
<div class="confirmation-container">
        <?php
        if (isset($_GET['activity'])) {
            $activity = $_GET['activity'];

            // Map of activity slugs to display names
            $activity_names = [
                'whale-watching' => 'Whale Watching',
                'scuba-diving'   => 'Scuba Diving',
                'kayaking'       => 'Kayaking',
                'hiking'         => 'Hiking'
            ];

            // Use mapped name or fallback to raw activity
            $activity_display = isset($activity_names[$activity]) ? $activity_names[$activity] : ucwords(str_replace('-', ' ', $activity));

            echo "<h1>🎉 Booking Confirmed!</h1>";
            echo "<p>You have successfully booked <strong>$activity_display</strong>.</p>";
            echo "<a href='index.php' class='back-btn'>← Back to Home</a>";
        } else {
            echo "<h1>Oops!</h1>";
            echo "<p>No booking information available.</p>";
            echo "<a href='index.php' class='back-btn'>← Back to Home</a>";
        }
        ?>
    </div>
</body>
</html>