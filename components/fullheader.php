<header class="container horizontal">
    <a href="./" id="branding" class="container horizontal">
        <svg class="logo" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
            viewBox="0 0 234.747 231.296" xml:space="preserve">
            <path d="M74.762,106.255c0-23.534,19.078-42.611,42.611-42.611c23.534,0,42.612,19.077,42.612,42.611
          c0,0.664-0.021,1.323-0.05,1.979c5.033-0.072,9.898-0.229,14.325-1.461c0.002-0.176,0.014-0.343,0.014-0.519
          c0-31.426-25.476-56.901-56.901-56.901c-31.425,0-56.9,25.476-56.9,56.901c0,0.179,0.012,0.349,0.014,0.527
          c4.427,1.226,9.292,1.381,14.325,1.452C74.781,107.578,74.762,106.919,74.762,106.255z" />
            <path d="M117.373,63.644c-23.533,0-42.611,19.077-42.611,42.611c0,0.664,0.02,1.323,0.05,1.979
        c4.723,0.067,9.594,0.064,14.389,0.806c-0.089-0.916-0.138-1.845-0.138-2.785c0-15.636,12.676-28.312,28.311-28.312
        c15.637,0,28.312,12.676,28.312,28.312c0,0.939-0.048,1.867-0.138,2.783c4.796-0.74,9.666-0.736,14.389-0.804
        c0.029-0.656,0.05-1.315,0.05-1.979C159.985,82.721,140.907,63.644,117.373,63.644z" />
            <path d="M117.373,77.943c-15.635,0-28.311,12.676-28.311,28.312c0,0.94,0.049,1.869,0.138,2.785
        c10.546,1.631,20.728,6.867,28.173,24.407c7.449-17.548,17.631-22.781,28.174-24.409c0.09-0.916,0.138-1.844,0.138-2.783
        C145.685,90.619,133.01,77.943,117.373,77.943z" />
            <path d="M190.749,94.684c-1.743-0.412-2.536,1.648-4.817,4.438c-1.109,1.331-2.567,2.885-4.66,4.374
        c-2.166,1.552-4.519,2.585-7.011,3.278c-4.427,1.231-9.292,1.389-14.325,1.461c-4.723,0.067-9.593,0.063-14.389,0.804
        c-10.543,1.628-20.725,6.861-28.174,24.409c-7.445-17.54-17.627-22.776-28.173-24.407c-4.795-0.741-9.666-0.738-14.389-0.806
        c-5.033-0.071-9.898-0.227-14.325-1.452c-2.504-0.693-4.868-1.729-7.043-3.287c-2.061-1.489-3.519-3.011-4.627-4.342
        c-2.251-2.79-3.075-4.882-4.818-4.47c-1.87,0.443-1.046,13.154,3.74,24.058c0.063,0.126,0.127,0.253,0.19,0.38
        c15.879,35.594,47.416,24.754,52.899,51.601c0.697,3.392,1.078,6.878,1.3,9.54c4.913,1.109,10.016,1.681,15.245,1.681
        c5.23,0,10.333-0.571,15.246-1.681c0.19-2.662,0.57-6.148,1.268-9.54c5.483-26.847,37.053-16.007,52.932-51.601
        c0.063-0.127,0.127-0.254,0.19-0.38C191.795,107.838,192.619,95.127,190.749,94.684z" />
        </svg>
        <span>Moffat Bay Resort</span>
    </a>

    <div id="user" class="container horizontal">
        <?php
        if (isset($_SESSION["user_id"])) {
            echo "<span>Hi ", $_SESSION["user_id"], "</span>";
            echo "<button type='button'>Log Out</button>";
        } else { ?>
            <a id="join" href="register.php">Join</a>
            <a id="login" href="login.php">Log In</a>
        <?php } ?>
    </div>
</header>
<nav class="container horizontal">
    <a href="./attractions.php">Attractions</a>
    <a href="./about.php">About Us</a>
    <a href="./my_reservation.php">Attractions</a>
    <a href="./contact.php">Get in Touch</a>
</nav>