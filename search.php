<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require 'components/head.php' ?>
    <title>Find Rooms</title>
</head>

<body>
    <?php
    require 'components/fullheader.php';
    require 'components/searchbar.php';
    ?>
    <main>
        <?php
        require 'functions/findrooms.php';
        // if someone got here via searching enter dates.
        if (isset($_GET['checkin']) && isset($_GET['checkout']) && ($_GET['guests'])) {
            find_rooms($_GET['checkin'], $_GET['checkout'], $_GET['guests']);
        } else {
            $in = date('Y-m-d', strtotime('+1 day'));
            $out = date('Y-m-d', strtotime('+2 day'));
            find_rooms($in, $out, 2);
        }
        if (count($_SESSION['available_rooms']) == 0) { ?>
            <div>No available rooms under those terms. Please search again.</div>
        <?php } else {
            foreach ($_SESSION['available_rooms'] as $room) {
                include 'components/card.php';
            }
        }
        ?>
    </main>

    <script src="search.js?v=<?php echo time(); ?>"></script>

</body>

</html>