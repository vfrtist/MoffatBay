<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
	<?php require 'components/head.php' ?>
	<title>Welcome to Moffat</title>
</head>

<body>
	<?php require 'components/fullheader.php' ?>
	<?php require 'components/searchbar.php' ?>
	<main>
		<figure class="container">
			<img src="images/bart-ns4bIZ6XeGY-unsplash.jpg" alt=" A whale at sunset">
			<figcaption>Experience the wonder</figcaption>
		</figure>
	</main>

	<script src="search.js?v=<?php echo time(); ?>"></script>

</body>

</html>