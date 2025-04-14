<?php
$status = 0;

// if the server method equals the post method, perform the following
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // if the email and password for the user is not empty, double check it through the
    // database
    if (!empty($_POST["email"]) && !empty($_POST["password"])) {
        // new connection to the database
        $conn = new mysqli("localhost", "root", "root", "lodgereservation");

        // this is checking to ensure the account does not already exist
        $stmt = $conn->prepare('SELECT userID FROM user WHERE email=?'); // find the user based on the email
        $stmt->bind_param("s", $_POST["email"]); // bind the parameter in order to execute the statement
        $stmt->execute();
        $stmt->store_result();

        // if the account already exists, update $status
        if ($stmt->num_rows > 0) {
            $status = 2;
        } else { // if it does not exist, create, and store, the new account to the database
            $hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
            $stmt = $conn->prepare('INSERT INTO User (firstname, lastname, email, password) VALUES (?, ?, ?, ?)');
            $stmt->bind_param("ssss", $_POST["firstName"], $_POST["lastName"], $_POST["email"], $hash);

            if ($stmt->execute()) {
                $status = 99; // creation succeeded
            } else {
                $status = -1; // creation failed
            }
        }

        // close the sql connection
        $conn->close();
    } else {
        $status = 1; // there are missing fields in the form
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require 'components/head.php' ?>
    <title>Welcome New User</title>
    <?php if ($status == 99) { ?>
        <meta http-equiv="refresh" content="5; url=index.php" />
    <?php } ?>
</head>

<body>
    <!-- Code used from the login page -->
    <?php require 'components/simpleheader.php' ?>
    <main id="grid">
        <div id="left">
            <img src="images/todd-cravens-QnBrjY-nFUs-unsplash.jpg" alt="A whale jumps out of the water">
        </div>
        <div id="right" class="container vertical">
            <?php if ($status < 99) { ?>
                <h2>Register</h2>
                <form method="POST">
                    <label for="firstName">First Name:</label><br>
                    <input type="text" name="firstName" required><br>

                    <label for="firstName">Last Name:</label><br>
                    <input type="text" name="lastName" required><br>

                    <label for="email">Email:</label><br>
                    <input type="email" name="email" required><br>

                    <label for="password">Password:</label><br>
                    <input type="password" name="password" required><br><br>

                    <button type="submit">Register</button>
                </form>
                <a href="login.php">Already Have an Account? Log In Here</a>
            <?php } ?>
        </div>
    </main>

    <?php
    // status code error messages
    if ($status == 1)
        echo "<p>Please fill out all fields.</p>";
    else if ($status == 2)
        echo "<p>Email already registered.</p>";
    else if ($status == 99)
        echo "<p>Registration successful! You can now <a href='login.php'>log in</a>.</p>";
    else if ($status == -1)
        echo "<p>Something went wrong. Try again.</p>";
    ?>
</body>

</html>