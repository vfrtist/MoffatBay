<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<?php
$status = 0;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if ($_POST["email"]) {
    $conn = new mysqli("localhost", "root", "root", "lodgereservation");
    $stmt = $conn->prepare('SELECT password, firstName FROM user WHERE email=?');
    $stmt->bind_param("s", $_POST["email"]);
    $stmt->execute();
    $res = $stmt->get_result();
    if ($res->num_rows == 0) {
      $status = 1;
    } else if ($res->num_rows > 1) {
      http_response_code(500);
      $status = -1;
    } else {
      $row = $res->fetch_array();
      $ha = $row[0];
      if (password_verify($_POST["password"], $ha)) {
        $_SESSION["user_id"] = $_POST["email"];
        $_SESSION["user_name"] = $row[1];
        $status = 99;
      } else {
        $status = 3;
      }
    }
    $conn->close();
  }
} ?>

<head>
  <?php require 'components/head.php' ?>
  <link rel="stylesheet" href="user.css" />
  <title>Log In</title>
  <?php if ($status == 99) { ?>
    <meta http-equiv="refresh" content="5; url=index.php" />
  <?php } ?>
</head>

<body>
  <?php require 'components/simpleheader.php' ?>
  <main id="grid">
    <div id="left">
      <img src="images/todd-cravens-QnBrjY-nFUs-unsplash.jpg" alt="A whale jumps out of the water">
    </div>
    <div id="right" class="container vertical">
      <?php if ($status != 0 && $status < 99) { ?>
        <div>
          <?php
          if ($status == 1) {
            echo "Email not found";
          }
          if ($status < 0) {
            echo "An error occured.";
          }
          if ($status == 3) {
            echo "Incorrect password.";
          }
          ?>
        </div>
      <?php } ?>
      <?php if ($status < 99) { ?>
        <h2>Log In</h2>
        <form id="loginForm" action="login.php" method="post" class="container vertical">
          <label for="email">EMAIL</label>
          <input type="text" name="email" id="email" />

          <label for="password">PASSWORD</label>
          <input type="password" name="password" id="password" />

          <button type="submit" class="cta1">Log In</button>
        </form>
        <a href="register.php">New? Register here</a>
      <?php } else { ?>
        Successfully logged in.
      <?php } ?>
    </div>
  </main>
</body>

</html>