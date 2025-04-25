<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<!--Code to Handle Incoming Message Here - Maybe relay to email?-->

<head>
	<?php require 'components/head.php' ?>
	<title>Contact Moffat Bay Lodge</title>
</head>

<body>
	<?php require 'components/fullheader.php' ?>
	<main>
		<?php if($_SERVER["REQUEST_METHOD"] == "POST"){ ?>
			<p>Your message has been received. Thank you for contacting Moffat Bay Lodge.</p>
		<?php }else{ ?>
			<img style="float:left;margin-right:3px" height="150px" src="images/k-lee-corey-PSTo0tGYzts-unsplash.jpg" />
			<div>
				<h2>Contact Us</h2>
				Moffat Bay Lodge<br/>
				1 Lodge Road<br/>
				Moffat Bay, ON 00000<br/>
				555-555-5555<br/><br/>
			</div>
			<form action="contact.php" method="post" style="font-size:0.8em;clear:both;margin-left:6px">
				<label for="name">Name:</label>
				<input required type="text" name="name">
				<label for="email">Email:</label>
				<input required type="text" name="email">
				<label for="phone">Phone (optional):</label>
				<input type="text" name="phone">
				<textarea required name="message" style="display:block" cols="100" rows="10" placeholder="Your message here."></textarea>
				<input type="submit" value="Contact">
			</form>
		<?php } ?>
	</main>
</body>

</html>