<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
	<?php require 'components/head.php' ?>
	<link rel="stylesheet" href="index.css">
	<title>Welcome to Moffat</title>
</head>

<body>
	<?php require 'components/fullheader.php' ?>

	<div id="hero" class="container vertical">
		<img src="images/hero foreground.png" alt="A whale at sunset" id="foreground">
		<h2 id="caption">Adventure starts here</h2>
		<div id="spacer"></div>
		<img src="images/hero background.png" alt="A whale at sunset" id="background">
	</div>

	<?php require 'components/searchbar.php' ?>

	<script src="search.js?v=<?php echo time(); ?>"></script>

</body>

</html>