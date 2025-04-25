<?php session_start() ?>
<!DOCTYPE html>
<!-- WIP -->
<html lang="en">

<head>
	<?php require 'components/head.php' ?>
	<?php
	if ((!isset($_SESSION["user_id"])) || is_null($_SESSION["user_id"])) {
		header('Location: login.php');//Redirect to login.php if user is not logged in
		die();//For security in the event that client fails to honor location header
	}
	$conn = new mysqli("localhost", "root", "root", "lodgereservation");
	?>
	<?php if ((!isset($_POST["action"])) || ($_POST["action"] != "confirm")) {
		$fn = "";

		//vv Dummy values for testing, comment out this line when not in use vv
		//$_POST["check_in"]="2025-06-18 17:30";$_POST["check_out"]="2025-06-20 08:00";$_POST["room_number"]=101;$_POST["number_guests"]=4;
	
		if (isset($_SESSION["user_name"])) {
			$fn = $_SESSION["user_name"];
		} else {
			$stmt = $conn->prepare("SELECT firstName from user WHERE email=?");
			$stmt->bind_param("s", $_SESSION["user_id"]);
			$stmt->execute();
			$res = $stmt->get_result();
			if ($res->num_rows == 1) {
				$fn = $_SESSION["user_name"] = ($res->fetch_array())[0];
			}
		}
		//May need to review how this is implemented
		$checkoutdate = floor((strtotime($_POST["check_out"]) - strtotime("2000-01-01")) / 86400);
		$checkindate = floor((strtotime($_POST["check_in"]) - strtotime("2000-01-01")) / 86400);
		$numnights = $checkoutdate - $checkindate;

		$_SESSION["check_in"] = $_POST["check_in"];
		$_SESSION["check_out"] = $_POST["check_out"];
		$_SESSION["number_guests"] = $_POST["number_guests"];
		$_SESSION["room_number"] = $_POST["room_number"];

		$stmt = $conn->prepare("SELECT roomtype.dailyRate FROM room,roomtype WHERE room.roomNumber = ? AND room.roomType = roomtype.typeId");
		$var_room = ((@$_POST["room_number"]) ?: "0");//The way php implements boolean or is inconvenient and this alternate syntax that does work isn't even particularly readable
		$stmt->bind_param("i", $var_room);
		$stmt->execute();
		$res = $stmt->get_result();
		if ($res->num_rows == 1) {
			$dailyRate = $res->fetch_array()[0];
		} else {
			http_response_code(400);
			//echo $_POST["room_number"];
			exit();//Can probably handle this more elegantly later
		}
		$_SESSION["total"] = $dailyRate * $numnights;
	} else {
		$stmt = $conn->prepare("SELECT userID FROM user WHERE email=?");
		$stmt->bind_param("s", $_SESSION["user_id"]);
		$stmt->execute();
		$res = $stmt->get_result();
		if ($res->num_rows == 1) {
			$uid = $res->fetch_array()[0];
		} else {
			http_response_code(400);
			exit();
		}
		$stmt = $conn->prepare("INSERT INTO reservation(user,roomNumber,checkin,checkout,numberGuests,amountPaid) VALUES (?,?,CAST(? AS DATE),CAST(? AS DATE),?,?)");
		$stmt->bind_param("iissii", $uid, $_SESSION["room_number"], $_SESSION["check_in"], $_SESSION["check_out"], $_SESSION["number_guests"], $_SESSION["total"]);
		$stmt->execute();
	}
	?>
	<link rel="stylesheet" href="user.css" />
	<title>Confirm your Reservation</title>
	<style>
		#left table tr td:first-child {
			text-align: right;
			margin-right: 1.2em
		}
	</style>
</head>

<body>
	<?php require 'components/simpleheader.php' ?>
	<br />
	<?php if (@$_POST["action"] == "confirm") { ?>
		<h2>Your Reservation has Been Confirmed</h2>
	<?php } else { ?>
		<h2>Confirm your Reservation</h2>
	<?php } ?>
	<main id="grid">
		<div id="left">
			<table>
				<tr>
					<td>Number of Guests</td>
					<td><?= @$_SESSION["number_guests"] ?></td>
				</tr>
				<tr>
					<td>First Name</td>
					<td><?= $_SESSION["user_name"] ?></td>
				</tr>
				<tr>
					<td>Check In</td>
					<td><?= @$_SESSION["check_in"] ?></td>
				</tr>
				<tr>
					<td>Check Out</td>
					<td><?= @$_SESSION["check_out"] ?></td>
				</tr>
				<tr>
					<td>Total Price</td>
					<td>$<?= @$_SESSION["total"] ?></td>
				</tr>
			</table>
		</div>
		<div id="right" class="container vertical">
			<img src="images/lagoon king.jpg" />
		</div>
		<?php if ((!isset($_POST["action"])) || ($_POST["action"] != "confirm")) { ?>
			<form action="confirm_reservation.php" method="POST" style="text-align:center">
				<input type="hidden" name="action" value="confirm" />
				<input type="submit" value="Confirm your Reservation" />
			</form>
		<?php } ?>
	</main>
</body>

</html>