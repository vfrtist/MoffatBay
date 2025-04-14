<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php require 'components/head.php' ?>
  <title>Welcome to Moffat</title>
</head>

<body>
  <?php require 'components/fullheader.php' ?>
  <main>
    <form action="" id="search" class="container horizontal">
      <fieldset class="container horizontal">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 16 16">
          <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5z" />
          <path
            d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z" />
        </svg>

        <div class="container vertical">
          <label for="arrival">CHECK IN</label>
          <input type="date" name="arrival" id="arrival">
        </div>

        <div class="container vertical">
          <label for="departure">CHECK OUT</label>
          <input type="date" name="departure" id="departure">
        </div>
      </fieldset>
      <fieldset class="container horizontal">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 16 16">
          <path
            d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
        </svg>
        <div class="container vertical">
          <label for="guests">GUESTS</label>
          <div class="container horizontal" id="guestsWrapper">
            <button type="button" id="down" class="counter">-</button>
            <input type="text" name="guests" id="guests" value="2">
            <button type="button" id="up" class="counter">+</butt>
          </div>
        </div>
      </fieldset>
      <button type="submit" class="cta1">Find My Room</button>
    </form>
    <figure class="container">
      <img src="images/bart-ns4bIZ6XeGY-unsplash.jpg" alt=" A whale at sunset">
      <figcaption>Experience the wonder</figcaption>
    </figure>
  </main>

  <script src="app.js"></script>

</body>

</html>