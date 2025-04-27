<div class="card container horizontal">
    <div class="imgWrapper">
        <img src="<?php
        require 'config/roomimages.php';
        echo $roomImages[$res['typeName']];
        ?>" alt="Your reserved room image">
    </div>

    <div class="info container vertical">
        <h2><?php echo htmlspecialchars($res['typeName']); ?></h2>

<!--        <div class="description">-->
<!--            Reservation #--><?php //echo htmlspecialchars($res['reservationID']); ?>
<!--        </div>-->

        <div class="size">
            Guests: <?php echo htmlspecialchars($res['numberGuests']); ?>
        </div>

        <div class="container horizontal">
            <ul class="tags container horizontal">
                <li>Room #: <?php echo htmlspecialchars($res['roomNumber']); ?></li>
                <li>Check-in: <?php echo htmlspecialchars($res['checkin']); ?></li>
                <li>Check-out: <?php echo htmlspecialchars($res['checkout']); ?></li>
            </ul>

            <div class="container vertical purchase">
                <h4 class="price">Paid: $<?php echo number_format($res['amountPaid'], 2); ?></h4>
                <div style="margin-top: auto;">
                    <!-- No booking form needed for reservations -->
                    <form method="post" action="cancel_reservation.php" onsubmit="return confirm('Are you sure you want to cancel this reservation?');">
                        <input type="hidden" name="reservationID" value="<?php echo htmlspecialchars($res['reservationID']); ?>">
                        <button type="submit" class="cta1" style="background-color: crimson;">Cancel</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
