<?php
$checkin = htmlspecialchars($_GET['checkin'] ?? '');
$checkout = htmlspecialchars($_GET['checkout'] ?? '');
$guests = htmlspecialchars($_GET['guests'] ?? '');
?>

<div id="searchWrapper">
	<form action="search.php" id="search" class="container horizontal">
		<fieldset class="container horizontal">
			<svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 16 16">
				<path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5z" />
				<path
					d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z" />
			</svg>

			<div class="container vertical">
				<label for="checkin">CHECK IN</label>
				<input type="date" name="checkin" id="checkin" value="<?php if ($checkin) {
					echo $checkin;
				} else {
					echo date('Y-m-d', strtotime('+1 day'));
				} ?>">
			</div>

			<div class="container vertical">
				<label for="checkout">CHECK OUT</label>
				<input type="date" name="checkout" id="checkout" value="<?php if ($checkout) {
					echo $checkout;
				} else {
					echo date('Y-m-d', strtotime('+2 day'));
				} ?>">
			</div>
		</fieldset>
		<fieldset class="container horizontal">
			<svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 16 16">
				<path d="M8,8c2.2,0,4-1.8,4-4s-1.8-4-4-4S4,1.8,4,4S5.8,8,8,8 M10.7,4c0,1.5-1.2,2.7-2.7,2.7S5.3,5.5,5.3,4S6.5,1.3,8,1.3
					S10.7,2.5,10.7,4 M16,14.7c0,1.3-1.3,1.3-1.3,1.3H1.3c0,0-1.3,0-1.3-1.3s1.3-5.3,8-5.3S16,13.3,16,14.7 M14.7,14.7
					c0-0.3-0.2-1.3-1.1-2.2c-0.9-0.9-2.5-1.8-5.6-1.8s-4.7,0.9-5.6,1.8c-0.9,0.9-1.1,1.9-1.1,2.2H14.7z" />
			</svg>
			<div class="container vertical">
				<label for="guests">GUESTS</label>
				<div class="container horizontal" id="guestsWrapper">
					<button type="button" id="down" class="counter">-</button>
					<input type="text" name="guests" id="guests" <?php if ($guests) {
						echo "value='$guests'";
					} else {
						echo "value=2";
					} ?>>
					<button type="button" id="up" class="counter">+</butt>
				</div>
			</div>
		</fieldset>
		<button type="submit" class="cta1">Find My Room</button>
	</form>
</div>